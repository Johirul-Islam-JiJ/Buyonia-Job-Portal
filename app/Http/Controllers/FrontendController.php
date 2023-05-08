<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::take(5)->get();
        $jobs = Job::latest()->when(request('search'), function ($q) {
            $search = request('search');
            $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('company_email', 'LIKE', "%{$search}%");
        })->orderBy('id', 'desc')->take(10)->get();
        return view('frontend.homepage', compact('jobs', 'departments'));
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

    public function suggest(Request $request)
    {
        $query = $request->input('query');
        $suggestions = Job::where('title', 'LIKE', "%$query%")
            ->orWhere('company_email', 'LIKE', "%$query%")
            ->pluck('title');
        return response()->json(['suggestions' => $suggestions]);
    }
}
