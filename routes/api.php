<?php

use App\Http\Controllers\Auth\LogController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/customer', 'CustomerController@index');
// Route::post('/add_customer', 'CustomerController@create');
// Route::get('/edit_customer', 'CustomerController@edit');
// Route::post('/update_customer', 'CustomerController@update');
// Route::resource('customer', CustomerController::class);
// Route::resource('customer', CustomerController::class)->except(['create', 'edit']);

Route::get('/home', [LogController::class, 'index']);
Route::resource('customer', CustomerController::class)->only(['index', 'show', 'update', 'delete', 'store']);
Route::resource('category', CategoryPostController::class);
Route::resource('post', PostController::class);
Route::resource('danh-muc', DanhmucController::class);
Route::resource('bai-viet', BaivietController::class);
Route::resource('/', HomeController::class)->names('home');
Route::get('/find', [HomeController::class, 'find'])->name('home.find');
