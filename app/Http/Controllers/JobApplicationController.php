<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Carbon\Carbon;
use Exception;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $jobApplication = JobApplication::with('job')->withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        return view('applications.index', compact('jobApplication'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Job $job)
    {
        $job = Job::findOrFail($job->id);
        return view('applications.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Job $job)
    {
        $job = Job::findOrFail($job->id);
        $jobswithvalidationDeadline = Job::where('id', $job->id)->where('application_deadline', '>=', Carbon::today())->exists();

        if ($jobswithvalidationDeadline) {

            $valid = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'image' => ['nullable', 'image', 'max:4096'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'string', 'max:255'],
                'address' => ['nullable', 'string', 'max:255'],
                'portfolio' => ['nullable', 'string', 'max:255'],
                'cover_letter' => ['nullable', 'file', 'max:8048'],
                'resume' => ['nullable', 'file', 'max:8048'],
                'expected_salary' => ['nullable', 'integer', 'min:0'],
                'notes' => ['nullable', 'string', 'max:255'],
            ]);

            if ($request->hasFile('image')) {
                try
                {
                    $valid['image'] = $request->file('image')->store('JobApplication', 's3');
                } catch (Exception $exception) {
                    return back()->with('toast-error', $exception->getMessage());
                }
            }

            if ($request->hasFile('cover_letter')) {
                try
                {
                    $valid['cover_letter'] = $request->file('cover_letter')->store('JobApplication', 's3');
                } catch (Exception $exception) {
                    return back()->with('toast-error', $exception->getMessage());
                }
            }
            if ($request->hasFile('resume')) {
                try
                {
                    $valid['resume'] = $request->file('resume')->store('JobApplication', 's3');
                } catch (Exception $exception) {
                    return back()->with('toast-error', $exception->getMessage());
                }
            }

            $application = $job->applications()->create($valid);
            if ($application) {
                return redirect(route('applications.index'))->with('toast-success', 'Application Completed Successfully');
            }

            return redirect()->back()->with('toast-error', 'Something went wrong');
        }

    }
    //create route for show

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobApplication  $jobApplication
     * @return \Illuminate\Http\Response
     */
    public function show($jobApplication, Job $job)
    {

        $jobApplication = JobApplication::findOrFail($jobApplication);
        $job = Job::where('id', $jobApplication->job_id)->first();

        return View('applications.show',compact('jobApplication','job'));
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

    public function resume(JobApplication $jobApplication)
    {
        $application = Storage::disk('s3')->get($jobApplication->resume);
        return response($application)
            ->header('content-type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $jobApplication->resume . '"');

    }

    public function coverLetter(JobApplication $jobApplication)
    {
        $application = Storage::disk('s3')->get($jobApplication->cover_letter);
        return response($application)
            ->header('content-type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $jobApplication->cover_letter . '"');
    }
    public function applicationImage(JobApplication $jobApplication)
    {
        try {
            $image = Storage::disk('s3')->get($jobApplication->image);
            return response($image)
                ->header('content-type', 'image');

        } catch (\Exception$exception) {
            return $exception->getMessage();
        }

    }

}
