<?php

namespace App\Http\Controllers;

use Auth;
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
     * Show the application dashboard.
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if (Auth::user()->is('Admin')) {
			return view('admin.home');
		}

        return view('home');
    }
}
