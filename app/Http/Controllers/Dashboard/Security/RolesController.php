<?php

namespace App\Http\Controllers\Dashboard\Security;

use App\Http\Controllers\Controller;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage') ?: 10;
        $roles = Roles::roleQuery()->paginate($perPage);

        return view('pages.dashboard.security.roles', compact('roles'));
    }
}
