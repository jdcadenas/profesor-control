<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'auth_login'])->name('auth_login');


// Auth::routes();


Route::group(['middleware' => 'userAdmin'], function () {

    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

