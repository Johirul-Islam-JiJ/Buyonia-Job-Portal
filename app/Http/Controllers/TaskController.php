<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $job)
    {
        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;
        $tasks = Task::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('task_name', 'LIKE', "%{$search}%")
                ->orWhere('task_details', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        $job = Job::get();

        return view('tasks.index', compact('tasks', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::get()->all();
        $applications = JobApplication::get()->all();
        return view('tasks.create', compact('jobs', 'applications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        // 'job_id' => 'nullable|exists:jobs,id',
        'task_name' => 'required|string',
        'task_details' => 'required|string',
        'applicant' => 'required|array',
        'applicant.*' => 'required|exists:job_applications,id',
    ]);

    // Create a new task for each selected applicant
    foreach ($validatedData['applicant'] as $applicantId) {
        Task::create([
            // 'job_id' => $validatedData['job_id'],
            'job_application_id' => $applicantId,
            'task_name' => $validatedData['task_name'],
            'task_details' => $validatedData['task_details'],
        ]);
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Tasks created successfully.');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('toast-success', 'Task deleted');

    }
}
