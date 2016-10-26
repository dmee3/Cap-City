<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Hash;

use App\User;
use App\Staffmember;
use App\Member;
use App\Conflict;
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
		$nextPayment = DB::table('pay_dates')->whereDate('due_date', '>=', $today)->first();

		return view('admin.home', [
			'reg' => $reg,
			'pay' => $pay,
			'members' => $members,
			'staff' => $staff,
			'conflicts' => $conflicts,
			'nextPayment' => $nextPayment
		]);
	}

	/**
	 * Show the staff dashboard.
	 *
	 * @param Request $request
	 * @return Response
	 */
	protected function staffIndex(Request $request) {

		$today = \Carbon\Carbon::today();
		$nextMonth = \Carbon\Carbon::today()->addMonth();

		$user = $request->user();
		$staff = Staffmember::where('user_id', $user->id)->first();
		$paid = sprintf('%.2f', $user->payments()->sum('amount'));

		$section = $staff->conflict_section;
		$sectionIDs = Member::where('section', $section)->select('user_id')->get();
		$idArray = array_map(function($val) { return $val['user_id']; }, $sectionIDs->toArray());
		$conflicts = Conflict::whereIn('user_id', $idArray)
			->whereDate('date_absent', '>=', $today)
			->whereDate('date_absent', '<=', $nextMonth)
			->orderBy('date_absent')->get();

		return view('staff.home', [
			'user' => $user,
			'paid' => $paid,
			'payments' => $user->payments(),
			'staff' => $staff,
			'conflicts' => $conflicts
		]);
	}

	/**
	 * Show the member dashboard.
	 *
	 * @param Request $request
	 * @return Response
	 */
	protected function memberIndex(Request $request) {

		$today = \Carbon\Carbon::today();

		$user = $request->user();
		$member = Member::where('user_id', $user->id)->first();

		$payDates = DB::table('pay_dates')->get();
		
		$paid = sprintf('%.2f', $user->payments()->sum('amount'));

		return view('members.home', [
			'user' => $user,
			'payments' => $user->payments,
			'paid' => $paid,
			'payDates' => $payDates,
			'member' => $member,
			'conflicts' => $user->futureConflicts
		]);
	}

    /**
     * Show the application home.
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

    /**
     * Show user settings.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
	public function settings(Request $request) {

		if (Auth::user()->is('Admin')) {
			return view('admin.settings');
		}

		if (Auth::user()->is('Staff')) {
			return view('staff.settings');
		}

		return view('members.settings');
	}

    /**
     * Change current user's password.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
	public function changePassword(Request $request) {

		if (!Hash::check($request->old_pass, $request->user()->password)) {
			return back()->withErrors('Old password was incorrect');
		}

		if ($request->new_pass != $request->confirm_pass) {
			return back()->withErrors('Passwords do not match');
		}

		$user = $request->user();
		$user->password = bcrypt($request->new_pass);
		$user->save();

		$request->session()->flash('success', 'Password changed!');
		return redirect('/home');
	}

    /**
     * Show full seasonn schedule.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
	public function schedule(Request $request) {

		if (Auth::user()->is('Admin')) {
			return view('admin.schedule');
		}

		if (Auth::user()->is('Staff')) {
			return view('staff.schedule');
		}

		return view('members.schedule');
	}
}
