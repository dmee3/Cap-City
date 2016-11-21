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
		$jobs = Job::with('member.user')->get();
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

    /**
     * Update an existing job (for admins only).
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {

		$job = Job::find($request->input('id'));
		$job->name = $request->input('name');
		$job->description = $request->input('description');
		$job->save();

		Member::where('id', $request->input('member'))->update(['job_id' => $job->id]);

		return redirect('/admin/jobs')->with('success', 'Updated job - ' . $job->name);
	}

    /**
     * Remove a member from an existing job (for admins only).
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
		public function removeMember(Request $request) {
			$member = Member::find($request->input('remove_member'));
			$member->job_id = 0;
			$member->save();

			return redirect('/admin/jobs')->with('success', 'Removed ' . $member->user->first_name . ' from ' . $request->input('job_name'));
		}
}
