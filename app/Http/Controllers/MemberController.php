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
     * Display a view for listing staff (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function staffIndex(Request $request) {
        return view('admin.staff');
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
			->leftJoin('jobs', 'members.job_id', '=', 'jobs.id')
			->select('members.id', 'members.user_id', 'users.first_name', 'users.last_name', 'members.dues',
				'members.section', 'members.subsection', 'jobs.name as job_name', 
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

    /**
     * Return a list of all staff (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function allStaff(Request $request) {

		$staff = DB::table('users')
			->join('staffmembers', 'users.id', '=', 'staffmembers.user_id')
			->select('staffmembers.id', 'staffmembers.user_id', 'users.first_name', 'users.last_name', 'staffmembers.pay',
				'staffmembers.position',
				DB::raw('(SELECT SUM(amount) FROM payments WHERE user_id = users.id) AS paid')
			)
			->where('users.deleted_at', null)
			->orderBy('users.first_name')
			->get();

		foreach ($staff as $s) {
			if ($s->paid == null || $s->paid == '') {
				$s->paid = 0;
			}
		}

		return $staff;
	}
}
