<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	 * Sign up for auditions.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function signUp(Request $request)
	{

		return view('site.auditions');
	}
}
