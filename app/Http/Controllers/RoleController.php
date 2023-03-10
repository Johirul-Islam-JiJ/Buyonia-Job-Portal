<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;
        $all_roles = Role::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('name', 'LIKE', "%{$search}%");
        })->orderBy('id', 'asc')->paginate($per_page_result);
        return view('roles.index', compact('all_roles'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('roles.create');
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

        $user = Role::create($validated);

        return redirect('role')->with('toast-success', 'New role created');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $edit_role = Role::find($id);
        return view('roles.edit', compact('edit_role'));
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

        $user = Role::find($id)->update($validated);
        return redirect('role')->with('toast-success', 'New role created');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if (auth()->user()->hasRole($role->name)) {
            return redirect()->back()->with('toast-error', 'You are assigned to this role');
        } elseif ($role->name == 'super admin') {
            return redirect()->back()->with('toast-error', 'You cant delete super admin role');
        } else {
            $role->delete();
            return redirect()->back()->with('toast-success', 'Role deleted');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        Role::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('toast-success', 'Role Permanantly Deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Role::withTrashed()->find($id)->restore();
        return redirect()->back()->with('toast-success', 'Role Restored');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function assignPermissionForm($id)
    {
        $role = Role::find($id);
        $user = User::find($id);
        if (auth()->user()->hasRole($role->name)) {
            return redirect()->back()->with('toast-error', 'You cant give permission to yourself');
        }
        if ($role->name == 'super admin') {
            return redirect()->back()->with('toast-error', 'You cant give permission to super admin');
        } else {
            $permissions = Permission::all();
            $assigned_permission_id = $role->permissions;
            return view('roles.assign_permission', compact('role', 'permissions', 'assigned_permission_id'));
        }
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assignPermission($id, Request $request)
    {
        $permissions = $request->permissions;
        $role = Role::find($id);
        $role->permissions()->sync($permissions);
        return redirect('role')->with('toast-success', 'Permission Assigned');
    }
}
