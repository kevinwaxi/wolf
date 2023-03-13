<?php

namespace App\Http\Controllers\Dashboard\Security;

use App\Actions\Store\StoreUserAction;
use App\Actions\Update\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreUserRequest;
use App\Http\Requests\Update\UpdateUserRequest;
use App\Models\Roles;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage') ?: 10;
        $users = User::with('roles')->paginate($perPage);

        return view('pages.dashboard.security.user_management', compact('users'));
    }

    public function create()
    {
        $roles = Roles::all();

        return view('pages.dashboard.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request, StoreUserAction $action)
    {
        $action->execute($request);

        return redirect()
            ->route('dashboard.security.users_management.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function show(User $user)
    {
        return view('pages.dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.dashboard.users.update', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action)
    {
        $action->execute($request, $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
