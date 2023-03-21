<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;

        $application = JobApplication::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        return view('applications.index',compact('application'));

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
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(JobApplication $jobApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplication $jobApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->delete();
        return redirect()->back()->with('toast-success', 'Application deleted successfully');

    }

    public function forceDelete($jobApplication)
    {
        JobApplication::onlyTrashed()->find($jobApplication)->forceDelete();
        return redirect()->back()->with('toast-success', 'Application Permanently Deleted');
    }

    public function restore($jobApplication)
    {
        JobApplication::onlyTrashed()->find($jobApplication)->restore();
        return redirect()->back()->with('toast-success', 'Application Restored');
    }
}
