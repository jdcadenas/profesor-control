<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
//use App\Http\Controllers\RolController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'auth_login']);


// Auth::routes();


Route::group(['middleware' => 'userAdmin'], function () {

    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard']);

    // Route::get('/panel/role', [RolController::class, 'list'])->name('role.list');
    // Route::get('/panel/role/add', [RolController::class, 'add'])->name('role.add');
    // Route::post('/panel/role/add', [RolController::class, 'insert']);
    // Route::get('/panel/role/edit/{id}', [RolController::class, 'edit'])->name('role.edit');
    // Route::put('/panel/role/{id}', [RolController::class, 'update'])->name('role.update');;
    // Route::delete('/panel/role/{role}', [RolController::class, 'delete'])->name('role.delete');


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

