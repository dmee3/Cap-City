<?php

namespace App\Http\Controllers;

use App\Conflict;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ConflictController extends Controller
{

	/**
	 * Show a listing of all upcoming conflicts.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		return view('admin.conflicts');
	}

	/**
	 * Get all upcoming conflicts.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function allConflicts(Request $request) {

		$today = \Carbon\Carbon::today();
		$conflicts = Conflict::with('user')
			->select('user_id', 'date_absent', 'reason')
			->whereDate('date_absent', '>', $today)
			->orderBy('date_absent')
			->get();

		foreach ($conflicts as $c) {
			$c->date_absent = date('l, n/j/Y', strtotime($c->date_absent));
		}

		return $conflicts;
	}

    /**
     * Add a new conflict.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function newConflict(Request $request)
    {
		//Validate required fields
		$this->validate($request, [
			'conflict_date' => 'required',
			'conflict_reason' => 'required'
		]);

		//Create new conflict
		$conflict = Conflict::create([
			'user_id' => $request->user()->id,
			'date_absent' => $request->input('conflict_date'),
			'reason' => $request->input('conflict_reason')
		]);

		//Send email for new conflict
		$data['name'] = $request->user()->first_name . ' ' . $request->user()->last_name;
		$data['date'] = $conflict->date_absent;
		$data['reason'] = $conflict->reason;
		Mail::send('emails.new-conflict', $data, function($message) use ($data) {
			$message->subject('New Conflict: ' . $data['name'])
				->to(env('DAN_EMAIL'))
				->cc(env('DONNIE_EMAIL'));
		});

		$request->session()->flash('success', 'Conflict added!');
		return redirect('/home');
	}
}
