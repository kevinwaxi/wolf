<?php

namespace App\Http\Controllers\Dashboard\Security;

use App\Http\Controllers\Controller;
use App\Models\Permissions;

class PermissionsController extends Controller
{
    public function index()
    {
        $perPage = request()->input('perPage') ?: 10;
        $permissions = Permissions::permissionQuery()->paginate($perPage);

        return view('pages.dashboard.security.permissions', compact('permissions'));
    }
}
