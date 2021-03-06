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
		return view('admin.dues');
    }

    /**
     * Return a JSON listing of all battery member payments (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function batteryDues(Request $request)
    {
		$users = User::with('member', 'payments')->get();
		$members = $users->filter(function($u) { return $u->member != null && $u->member->section == 'Battery'; });
		return $this->getFormattedMembers($members, ['Snare', 'Tenors', 'Bass', 'Cymbals']);
    }

    /**
     * Return a JSON listing of all front member payments (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function frontDues(Request $request)
    {
		$users = User::with('member', 'payments')->get();
		$members = $users->filter(function($u) { return $u->member != null && $u->member->section == 'Front'; });
		return $this->getFormattedMembers($members, ['Marimba', 'Vibes', 'Xylophone', 'Auxiliary', 'Electronics']);
    }

    /**
     * Return a JSON listing of all front payment dates.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function payDates(Request $request)
    {
		$payDates = DB::table('pay_dates')->get();
		foreach ($payDates as $p) {
			$p->due_date = date('n/j/Y', strtotime($p->due_date));
		}
		return $payDates;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//Validate required fields
		$val = Validator::make($request->all(), [
			'user_id' => 'required',
			'amount' => 'required',
			'date_paid' => 'required'
		]);
		if ($val->fails()) {
			return redirect('/admin/dues')->withErrors($val);
		}

		//Create and store payment
		$payment = Payment::create([
			'user_id' => $request->input('user_id'),
			'amount' => $request->input('amount'),
			'date_paid' => $request->input('date_paid'),
			'type' => $request->input('type'),
			'info' => $request->input('info'),
			'category' => 0
		]);

        return redirect('/admin/dues');
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
			return redirect('/home')->withErrors($val);
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

	/**
	 * Helper function to get members of a section
	 */
	private function getFormattedMembers($members, $sectionNames) {

		$totalRemaining = 0;
		$totalPaid = 0;
		$today = \Carbon\Carbon::today();
		$total_due = DB::table('pay_dates')->whereDate('due_date', '<', $today)->sum('due');

		foreach($members as $m) {

			foreach ($m->payments as $p) {
				$p->date_paid = date('l, n/j/Y', strtotime($p->date_paid));
			}

			$m->paid = $m->payments->sum('amount');
			$m->pay_width = $m->paid * 100 / $m->member->dues;
			if ($m->pay_width == 0) {
				$m->pay_width = 0.5;
			}

			$m->pay_color = "red";
			if ($m->paid >= $total_due || $m->paid >= $m->member->dues) {
				$m->pay_color = "green";
			}

			$totalPaid += $m->paid;
			$totalRemaining += $m->member->dues - $m->paid;
		}

		$sections = [];
		foreach($sectionNames as $s) {
			$sections[$s]['members'] = $members->filter(function($ele) use ($s) {
				return $ele->member->subsection == $s;
			});
			$sections[$s]['name'] = $s;
		}

		return ['sections' => $sections, 'totalPaid' => $totalPaid, 'totalRemaining' => $totalRemaining];
	}

    /**
     * Update a payment plan (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
	public function setPaymentPlan(Request $request) {

		$this->validate($request, [
			'user_id' => 'required',
			'payment_plan' => 'required'
		]);

		$user = User::find($request->input('user_id'));
		$member = $user->member;
		$member->payment_plan = $request->input('payment_plan');
		$member->save();

		$request->session()->flash('success', 'Payment plan updated!');
		return redirect('/admin/dues');
	}
}
