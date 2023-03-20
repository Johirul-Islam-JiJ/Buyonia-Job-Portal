<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;

        $job = Job::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('company_email', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        return view('jobs.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'integer', 'min:0'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:255'],
            'application_deadline' => ['nullable', 'date', 'after_or_equal:today'],
            'application_link' => ['nullable', 'string', 'max:255'],
            'how_to_apply' => ['required', 'string'],
            'job_category' => ['nullable', 'string', 'max:255'],
            'job_level' => ['required', 'string', 'max:255'],
            'job_nature' => ['nullable', 'string', 'max:255'],
            'employment_status' => ['nullable', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_website' => ['nullable', 'string', 'max:255'],
            'company_email' => ['required', 'email', 'unique:jobs,company_email'],
            'company_phone' => ['required', 'string', 'max:255'],
            'company_address' => ['nullable', 'string', 'max:255'],
        ]);

        if (Job::create($valid));

        return redirect(route('jobs.index'))->with('toast-success', 'New Job created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $job = Job::find($job);
        return view('jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->back()->with('toast-success', 'Job deleted');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($job)
    {
        Job::onlyTrashed()->find($job)->forceDelete();
        return redirect()->back()->with('toast-success', 'Job Permanantly Deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($job)
    {
        Job::onlyTrashed()->find($job)->restore();
        return redirect()->back()->with('toast-success', 'Job Restored');
    }
}
