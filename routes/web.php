<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'login'])->name('login');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'userAdmin'], function () {

    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});



