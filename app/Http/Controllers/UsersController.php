<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use App\Notifications\MailForNewAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $per_page_result = request('per_page_result') ? request('per_page_result') : 5;
        $all_users = User::withTrashed()->where(function ($q) {
            $search = request('search');
            $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        })
            ->orderBy('id', 'asc')->paginate($per_page_result);

        return view('users.index', compact('all_users'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],

        ]);

        $password = Str::random(8);
        $hashedPassword = Hash::make($password);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashedPassword;

        try {
            if ($user->save()) {
                $user->notify(new MailForNewAccount($password, $user->name, $user->email));
                return redirect('user')->with('toast-success', 'New user created');
            }
        } catch (exception $e) {
            return redirect('user')->with('toast-error', 'Something wrong! please try again');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $edit_user = User::find($id);
        return view('users.edit', compact('edit_user'));
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
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $password = $request->password;
        $hashedPassword = Hash::make($password);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashedPassword;
        $user->update();

        return redirect('user')->with('toast-success', 'User updated');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //soft delete
        $user = User::find($id);
        if (auth()->user()->id == $user->id) {
            return redirect()->back()->with('toast-error', 'You cant delete yourself!');
        } elseif ($user->hasRole('super admin')) {
            return redirect()->back()->with('toast-error', 'You cant delete super admin!');
        } else {
            $user->delete();
            return redirect()->back()->with('toast-success', 'User deleted');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('toast-success', 'User Permanantly Deleted');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('toast-success', 'User Restored');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function assignRoleForm($id)
    {
        $user = User::find($id);
        if (auth()->user()->id == $id) {
            return redirect()->back()->with('toast-error', 'You cant assign role for yourself!');
        } elseif ($user->hasRole('super admin')) {
            return redirect()->back()->with('toast-error', 'You cant assign role for super admin!');
        } else {
            $roles = Role::all();
            $assigned_role_id = $user->roles;
            return view('users.assign_role', compact('user', 'roles', 'assigned_role_id'));
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function assignRole($id, Request $request)
    {
        $roles = $request->roles;
        $user = User::find($id);
        $user->roles()->sync($roles);
        return redirect('user')->with('toast-success', 'Role Assigned');
    }
}
