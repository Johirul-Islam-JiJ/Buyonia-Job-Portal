<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;

class FrontendController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.homepage', compact('jobs'));
    }

    public function all_jobs()
    {
        $jobs = Job::orderBy('id', 'desc')->get();
        return view('frontend.allJobs', compact('jobs'));

    }

    public function show_job(Job $job, Department $department)
    {
        $department = Department::where('id', $job->department_id)->get();
        $job = Job::findOrFail($job->id);
        return view('frontend.showJobs', compact('job', 'department'));

    }
}
