<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/classes', function () {
    return view('classes');
})->middleware('auth');

Route::get('/grades', function () {
    return view('grades');
})->middleware('auth');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->middleware(['auth','can:isAdmin']);
//Route::get('/users/{id}', [UserController::class, 'destroy'])->middleware(['auth','can:isAdmin']);
Route::get('users/register', [RegisterController::class, 'index'])->middleware(['auth','can:isAdmin']);
