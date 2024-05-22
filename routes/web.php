<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/',[AuthController::class,'login']);
Route::post('/',[AuthController::class,'auth_login']);

Route::get('/panel/dashboard',[DashboardController::class,'dashboard']);


// Route::get('/', function () {
//     return view('welcome');
// });
