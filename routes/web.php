<?php

use App\Http\Controllers\Auth\LogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', function() { return view('auth.login'); });
Route::get('/bai-viet/{id}', [BaivietController::class, 'show'] );

Auth::routes();
Route::get('/home', [LogController::class, 'index']);
