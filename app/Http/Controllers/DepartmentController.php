<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;

        $department = Department::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('name', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        return view('department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'name' => ['required', 'string', 'max:255'],
        ]);

        if (Department::create($valid));

        return redirect(route('department.index'))->with('toast-success', 'New Department created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $department = Department::findOrFail($department->id);
        return view('department.edit', compact('department'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $department->name = $valid['name'];
        $department->save();

        if ($department) {
            return redirect('/department')->with('toast-success', 'Department Updated Successfully');
        }

        return redirect('/department')->with('toast-error', 'Something wrong! please try again');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->back()->with('toast-success', 'Department deleted');

    }
    public function restore($department)
    {
        Department::onlyTrashed()->find($department)->restore();
        return redirect()->back()->with('toast-success', 'Department Restored');
    }
    public function forceDelete($department)
    {
        Department::onlyTrashed()->find($department)->forceDelete();
        return redirect()->back()->with('toast-success', 'Department Permanently Deleted');
    }
}
