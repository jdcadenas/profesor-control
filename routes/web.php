<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/',[AuthController::class,'login']);

// Route::get('/', function () {
//     return view('welcome');
// });
