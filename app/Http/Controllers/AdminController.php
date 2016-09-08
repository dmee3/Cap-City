<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Member;
use App\Staffmember;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class AdminController extends Controller
{

	/**
	 * Create a new user.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function createUser(Request $request) {

		//Validate required fields
        $this->validate($request, [
            'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
			'role' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

		//Save basic properties
		$user = User::create([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
        ]);

		//Save user role
		$role = Role::firstOrCreate(['name' => $request->input('role')]);
		$user->roles()->save($role, []);

		//Set up member or staff
		if ($request->input('role') == 'Member') {
			$member = Member::create([
				'user_id' => $user->id,
				'dues' => $request->input('member_dues')
			]);
		} else if ($request->input('role') == 'Staff') {
			$staff = Staffmember::create([
				'user_id' => $user->id,
				'position' => $request->input('staff_position'),
				'pay' => $request->input('staff_pay'),
				'conflict_section' => $request->input('staff_conflict_section')
			]);
		}

		//Send email to user
		$emailData['first'] = $request->input('first_name');
		$emailData['last'] = $request->input('last_name');
		$emailData['password'] = $request->input('password');
		$emailData['email'] = $request->input('email');
		Mail::send('emails.new-user', $emailData, function($message) use ($emailData) {
			$message->subject('New User Account')->to($emailData['email'])
				->bcc('dan.meehan17@gmail.com');
		});

		//Return to dashboard
		$request->session()->flash('success', 'User created!');
		return redirect('/home');
	}
}
