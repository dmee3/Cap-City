<?php

namespace App\Http\Controllers;

use Auth;
use DB;

use App\User;
use App\Http\Requests;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Show the admin dashboard.
	 *
	 * @param Request $request
	 * @return Response
	 */
	protected function adminIndex(Request $request) {

		$today = \Carbon\Carbon::today();
		$lastThreeDays = \Carbon\Carbon::today()->subDays(3);
		$lastWeek = \Carbon\Carbon::today()->subWeek();
		$lastMonth = \Carbon\Carbon::today()->subMonth();
		$nextMonth = \Carbon\Carbon::today()->addMonth();

		$reg['week'] = DB::table('auditions')->whereDate('created_at', '>=', $lastWeek)->count();
		$reg['total'] = DB::table('auditions')->count();
		$pay['week'] = DB::table('payments')->whereDate('created_at', '>=', $lastWeek)->sum('amount');
		$pay['month'] = DB::table('payments')->whereDate('created_at', '>=', $lastMonth)->sum('amount');
		$members = DB::table('members')->count();
		$staff = DB::table('staffmembers')->count();
		$conflicts = DB::table('conflicts')->whereDate('date_absent', '>=', $today)->whereDate('date_absent', '<=', $nextMonth)->count();

		return view('admin.home', [
			'reg' => $reg,
			'pay' => $pay,
			'members' => $members,
			'staff' => $staff,
			'conflicts' => $conflicts
		]);
	}

	/**
	 * Show the staff dashboard.
	 *
	 * @param Request $request
	 * @return Response
	 */
	protected function staffIndex(Request $request) {

		return view('staff.home');
	}

	/**
	 * Show the member dashboard.
	 *
	 * @param Request $request
	 * @return Response
	 */
	protected function memberIndex(Request $request) {

		$user = $request->user();
		$paid = $user->payments()->sum('amount');
		return view('members.home', [
			'payments' => $user->payments,
			'paid' => $paid,
			'conflicts' => $user->conflicts
		]);
	}

    /**
     * Show the application dashboard.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if (Auth::user()->is('Admin')) {
			return $this->adminIndex($request);
		}

		if (Auth::user()->is('Staff')) {
			return $this->staffIndex($request);
		}

        return $this->memberIndex($request);
    }

}
