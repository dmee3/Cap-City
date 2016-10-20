<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Member;
use App\Conflict;
use App\Payment;
use App\Http\Requests;

class MemberController extends Controller
{
    /**
     * Display a view for listing members (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.members');
    }

    /**
     * Delete a member (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {

		$this->validate($request, [
			'member_id' => 'required'
		]);

		$memberId = $request->input('member_id');
		$member = Member::find($memberId);
		$user = User::find($member->user_id);
		$payments = $user->payments();
		$conflicts = $user->conflicts();

		$member->delete();
		$user->delete();
		foreach($payments as $p) { $p->delete(); }
		foreach($conflicts as $c) { $c->delete(); }

		return $this->index($request);
	}

    /**
     * Return a list of all members (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function allMembers(Request $request) {

		$members = DB::table('users')
			->join('members', 'users.id', '=', 'members.user_id')
			->select('members.id', 'members.user_id', 'users.first_name', 'users.last_name', 'members.dues',
				'members.section', 'members.subsection',
				DB::raw('(SELECT SUM(amount) FROM payments WHERE user_id = users.id) AS paid'),
				DB::raw('(SELECT COUNT(*) FROM conflicts WHERE user_id = users.id) AS conflicts')
			)
			->where('users.deleted_at', null)
			->orderBy('users.first_name')
			->get();

		foreach ($members as $m) {
			if ($m->paid == null || $m->paid == '') {
				$m->paid = 0;
			}
		}

		return $members;
	}
}
