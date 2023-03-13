<?php

use App\Http\Controllers\Dashboard\Catalogue\DeviceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Security\PermissionsController;
use App\Http\Controllers\Dashboard\Security\RolesController;
use App\Http\Controllers\Dashboard\Security\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::resource('home', DashboardController::class);
    // logged in user profile
    // Route::resource('profile', ProfileController::class);
    Route::group(['prefix' => 'security', 'as' => 'security.'], function () {
        Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions');
        Route::resource('roles', RolesController::class);
        Route::resource('users_management', UsersController::class);
    });
    Route::group(['prefix' => 'catalogue', 'as' => 'catalogue.'], function () {
        Route::resource('devices', DeviceController::class);
        Route::resource('categories', CategoriesController::class);
        // Route::resource('repairs', RepairsController::class);
    });
});
