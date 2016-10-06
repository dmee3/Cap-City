<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class MemberController extends Controller
{
    /**
     * Display a listing of all members (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
		$members = DB::table('users')
			->join('members', 'users.id', '=', 'members.user_id')
			->select('users.id', 'users.first_name', 'users.last_name', 'members.dues',
				'members.section', 'members.subsection',
				DB::raw('(SELECT SUM(amount) FROM payments WHERE user_id = users.id) AS paid'),
				DB::raw('(SELECT COUNT(*) FROM conflicts WHERE user_id = users.id) AS conflicts')
			)
			->orderBy('users.first_name')
			->get();

		foreach ($members as $m) {
			if ($m->paid == null || $m->paid == '') {
				$m->paid = 0;
			}
		}

		return view('admin.members', ['members' => $members]);
	}

    /**
     * Delete a member (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
		return $this->index($request);
	}
}
