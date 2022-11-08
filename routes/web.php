<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\ClassesController;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/classes', [ClassesController::class, 'index']);
    Route::get('/grades', [GradesController::class, 'index']);
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
        Route::get('/users/register', [RegisterController::class, 'index']);
    });
});