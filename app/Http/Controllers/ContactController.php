<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMeRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
	/**
     * Display contact form.
     *
     * @return Response
     */
    public function index()
    {
        return view('site.contact');
    }

    /**
     * Send message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendContactInfo(ContactMeRequest $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
        ]);
		$data = $request->only('name', 'email', 'phone');
	    $data['messageLines'] = explode("\n", $request->get('message'));

		Mail::send('emails.contact', $data, function ($message) use ($data) {
		$message->subject('Cap City Contact Form: '.$data['name'])
			->to('dan.meehan17@gmail.com')
			->replyTo($data['email']);
		});

		return back()->withSuccess("Thank you for your message. It has been sent.");
    }
}
