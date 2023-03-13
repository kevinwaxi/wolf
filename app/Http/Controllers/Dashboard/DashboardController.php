<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Issue;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // load statistics
        $users = User::count();
        $tasks = Issue::count();

        return view('pages.dashboard.home');
    }
}
