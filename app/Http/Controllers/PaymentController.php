<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\Member;
use App\Http\Requests;

class PaymentController extends Controller
{
    /**
     * Display a listing of all payments (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

		$today = \Carbon\Carbon::today();
		$total_due = DB::table('pay_dates')->whereDate('due_date', '<', $today)->sum('due');

		$users = User::with('member', 'payments')->get();
		$members = $users->reject(function($u) { return $u->member == null; });
		foreach($members as $m) {
			$m->paid = $m->payments->sum('amount');
			$m->pay_color = "red";
			if ($m->paid > $total_due) {
				$m->pay_color = "green";
			}
		}

		$batterySections = ['Snare', 'Tenors', 'Bass', 'Cymbals'];
		$frontSections = ['Marimba', 'Vibes', 'Xylophone', 'Auxiliary', 'Electronics'];

		foreach($batterySections as $section) {
			$battery[$section] = $members->filter(function($ele) use ($section) {
				return $ele->member->subsection == $section;
			});
		}
		foreach($frontSections as $section) {
			$front[$section] = $members->filter(function($ele) use ($section) {
				return $ele->member->subsection == $section;
			});
		}

		return view('admin.dues', ['battery' => $battery, 'front' => $front]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Charge the current user via Stripe.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
	public function newStripePayment(Request $request) {

		//Validate charge amount
		$val = Validator::make($request->all(), [
			'stripeToken' => 'required',
			'charge_amount' => 'required'
		]);
		if ($val->fails()) {
			return redirect('/home')->withErros($val);
		}

		//Charge card
		$amt = $request->input('charge_amount') * 100;
		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
		$token = $request->input('stripeToken');
		try {
			$charge = \Stripe\Charge::create([
				"amount" => $amt, //Amount in cents
				"currency" => "usd",
				"source" => $token,
				"description" => "Cap City Dues Payment - " . $request->user()->first_name . " " . $request->user()->last_name,
				"receipt_email" => $request->user()->email
			]);
		} catch(\Stripe\Error\Card $e) {
			$request->session()->flash('error', 'Your credit card was declined, please double check your card info.  If this pops up again, plesae ask an admin for help.');
			return redirect('/home');
		}

		//Store payment info
		$payment = Payment::create([
			'user_id' => $request->user()->id,
			'amount' => $request->input('duesAmt'),
			'date_paid' => \Carbon\Carbon::today(),
			'type' => 'stripe',
			'category' => 0
		]);

		$request->session()->flash('success', 'Payment received!');
		return redirect('/home');
	}
}
