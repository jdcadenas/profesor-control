<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;


Route::get('/', [AuthController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['userAdmin', 'deleteConfirmation']], function () {

    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('schools', SchoolController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('categories', CategoriesController::class);

    //Route::get('/categoriastree', [CategoriesController::class, 'index'])->name('categoria');

});
Route::get('/categoriestree', [CategoriesController::class, 'treeindex']);
//Route::get('/usermoodle/{email}',[UserController::class,'getusermoodle']);
Route::get('/request', [UserController::class, 'request']);

// Route::namespace('moodle')->group(function () {
//     Route::get('/users', [UsersController::class, 'index'])->name('users-list');
//     Route::get('/enrolled-users', [UsersController::class, 'enrolled'])->name('enrolled-users-list');
//     Route::get('/courses', [CoursesController::class, 'index'])->name('courses-list');
//    // Route::get('/categoriastree', [CategoriesController::class, 'index'])->name('categoria');
// });
