<?php

namespace App\Http\Controllers;

use App\Transaction;

use Illuminate\Http\Request;
use App\Http\Requests;

class TransactionController extends Controller
{
	/**
	 * Show a listing of all transactions.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		$txns = Transaction::with('user')->orderBy('date_paid', 'desc')->get();

		foreach ($txns as $t) {
			$t->date_paid = date('l, n/j/Y', strtotime($t->date_paid));
		}
		return view('admin.transactions', ['transactions' => $txns]);
	}

	/**
	 * Create a new transaction.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		$this->validate($request, [
			'amount' => 'required',
			'date_paid' => 'required',
			'title' => 'required'
		]);

		$txn = Transaction::create([
			'user_id' => $request->user()->id,
			'date_paid' => $request->input('date_paid'),
			'amount' => $request->input('amount'),
			'title' => $request->input('title'),
			'notes' => $request->input('notes')
		]);
		
		$request->session()->flash('success', 'Transaction added!');
		return redirect('/admin/transactions');
	}
}
