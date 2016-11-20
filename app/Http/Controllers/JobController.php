<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Member;
use App\Http\Requests;

class JobController extends Controller
{
    /**
     * Display a view for listing jobs (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return view('admin.jobs');
	}

    /**
     * Return a list of all jobs (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function allJobs(Request $request) {
		$jobs = Job::all();
		foreach ($jobs as $j) {
			$m = Member::where('job_id', '=', $j->id)->get();
			$j->members = $m;
		}
		return $jobs;
	}

    /**
     * Create a new job (for admins only).
     *
	 * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
		$job = Job::create([
			'name' => $request->input('name'),
			'description' => $request->input('description')
		]);
		return redirect('admin/jobs');
	}
}
