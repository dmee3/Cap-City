<?php

namespace App\Http\Controllers;

use App\Conflict;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ConflictController extends Controller
{
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
