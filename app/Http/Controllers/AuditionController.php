<?php

namespace App\Http\Controllers;

use App\Audition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Requests;

class AuditionController extends Controller
{
	/**
     * Display audition form.
     *
     * @return Response
     */
    public function index()
    {
        return view('site.auditions');
    }

	/**
	 * Download the audition packet.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function getPacket(Request $request) {

		if ($request->session()->has('download')) {
			$request->session()->forget('download');
			return response()->download('/var/www/cap-city/public/pdf/CapCityPacket2017.pdf');
		} else {
			return view('site.index');
		}
	}

	/**
	 * Sign up for auditions.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function signUp(Request $request)
	{

		//Validate required info
		$val = Validator::make($request->all(), [
			'first' => 'required',
			'last' => 'required',
			'email' => 'required|email'
		]);

		if ($val->fails()) {
			return redirect('/auditions')->withInput()->withErrors($val);
		}

		//Calculate charge amount
		$amt = 0;
		$description = "";
		if ($request->packet) {
			$amt += 1500;
		}
		if ($request->register) {
			$amt += 6500;
		}
		if ($request->chipotle1) {
			$amt += 1200;
		}
		if ($request->chipotle2) {
			$amt += 1200;
		}
		if ($amt > 0) {
			$amt += 300;
		}

		//Charge card
		\Stripe\Stripe::setApiKey("sk_live_5WvOjlZ6FcEh8ms6bEogrPYB");
		$token = $_POST['stripeToken'];
		try {
			$charge = \Stripe\Charge::create(array(
				"amount" => $amt, //Amount in cents
				"currency" => "usd",
				"source" => $token,
				"description" => "Cap City Auditions - " . $request->first . " " . $request->last
			));
		} catch(\Stripe\Error\Card $e) {
			$request->session()->flash('error', 'We had an issue charging your card.  Please email dan.meehan17@gmail.com for help.  Sorry about that!');
			return view('site.auditions');
		}

		//Store registration
		$aud = new Audition;
		$aud->first_name = $request->first;
		$aud->last_name = $request->last;
		$aud->email = $request->email;
		$aud->phone = $request->phone ?: '';
		$aud->address1 = $request->address1 ?: '';
		$aud->address2 = $request->address2 ?: '';
		$aud->city = $request->city ?: '';
		$aud->state = $request->state ?: '';
		$aud->zip = $request->zip ?: '';
		$aud->instr1 = $request->instr1 ?: '';
		$aud->instr2 = $request->instr2 ?: '';
		$aud->instr3 = $request->instr3 ?: '';
		$aud->reason = $request->reason ?: '';
		$aud->experience = $request->experience ?: '';
		$aud->registered = ($request->register ? 'true' : 'false');
		$aud->packet = ($request->packet ? 'true' : 'false');
		$aud->chipotle1 = ($request->chipotle1 ? 'true' : 'false');
		$aud->chipotle2 = ($request->chipotle2 ? 'true' : 'false');
		$aud->save();

		//Send emails
		try {

			//Send notification email to staff
			$data = array(
				'name' => $aud->first_name . ' ' . $aud->last_name,
				'email' => $aud->email,
				'instr1' => $aud->instr1,
				'instr2' => $aud->instr2,
				'instr3' => $aud->instr3
			);
			$data['packet'] = ($aud->packet == 'true' ? 'yes' : 'no');
			$data['registered'] = ($aud->registered == 'true' ? 'yes' : 'no');
			$data['chipotle1'] = ($aud->chipotle1 == 'true' ? 'yes' : 'no');
			$data['chipotle2'] = ($aud->chipotle2 == 'true' ? 'yes' : 'no');

			Mail::send('emails.registration', $data, function($message) use ($data) {
				$message->subject('Cap City Audition: ' . $data['name'])
					->to('dan.meehan17@gmail.com');
			});

			if ($aud->instr1 == 'Cymbals' || $aud->instr2 == 'Cymbals' || $aud->instr3 == 'Cymbals') {
				Mail::send('emails.registration', $data, function($message) use ($data) {
					$message->subject('Cap City Cymbals Audition: ' . $data['name'])
						->to('arielpeel@gmail.com')->cc('coopermannon@gmail.com');
				});
			}

			//Send confirmation email to purchaser
			$conf = array('id' => $aud->id);
			$total = 0;
			if ($aud->packet == 'true') {
				$conf['packet'] = 'true';
				$total += 15;
			} else {
				$conf['packet'] = 'false';
			}
			if ($aud->registered == 'true') {
				$conf['registered'] = 'true';
				$total += 65;
			} else {
				$conf['registered'] = 'false';
			}
			if ($aud->chipotle1 == 'true') {
				$conf['chipotle1'] = 'true';
				$total += 12;
			} else {
				$conf['chipotle1'] = 'false';
			}
			if ($aud->chipotle2 == 'true') {
				$conf['chipotle2'] = 'true';
				$total += 12;
			} else {
				$conf['chipotle2'] = 'false';
			}
			if ($total > 0) $total += 3;
			$conf['total'] = $total;
			$conf['email'] = $aud->email;

			Mail::send('emails.reg-confirm', $conf, function($message) use ($conf) {
				$message->subject('Cap City Audition Confirmation')
					->to($conf['email'])
					->attach('/var/www/cap-city/public/pdf/CapCityPacket2017.pdf');
			});
		} catch (Exception $e) {}




		//Return packet download
		$request->session()->put('download', 'get-packet');
		return view('site.auditions-success');
	}
}
