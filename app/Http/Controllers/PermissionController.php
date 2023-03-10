<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $per_page_result= request('per_page_result') ? request('per_page_result') : 5;
        $all_permissions= Permission::withTrashed()->where(function ($q){
            $search=request('search');
            $q->where('name','LIKE',"%{$search}%");
        })
            ->orderBy('id','asc')->paginate($per_page_result);
        return view('permissions.index',compact('all_permissions'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('permissions.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',

        ]);

        $user = Permission::create($validated);
        return redirect('permission')->with('toast-success','New permission created');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $edit_permission = Permission::find($id);
        return view('permissions.edit',compact('edit_permission'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $user = Permission::find($id)->update($validated);
        return redirect('permission')->with('toast-success','permission modified');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = Permission::find($id)->delete();
        return redirect()->back()->with('toast-success', 'Permission deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id){
        Permission::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('toast-success', 'Permission Permanantly Deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id){
        Permission::withTrashed()->find($id)->restore();
        return redirect()->back()->with('toast-success', 'Permission Restored');
    }
}
