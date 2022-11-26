<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Auth\Access\Gate;

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
    Route::get('/classes', [ClassesController::class, 'index']);
    Route::get('/grades', [GradesController::class, 'index']);
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/users', [UserController::class, 'index']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
        Route::get('/users/register', [RegisterController::class, 'index']);
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
    });   
    Route::get('/classes/edit/{class}', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('/classes/{class}', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('/classes/add', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('/classes', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('/grades/edit/{grade}', [GradesController::class, 'edit'])->name('grades.edit');
    Route::post('/grades/{grade}', [GradesController::class, 'update'])->name('grades.update');
    Route::get('/grades/show/{grades}', [GradesController::class, 'show'])->name('grades.show');
    Route::get('/grades/add', [GradesController::class, 'create'])->name('grades.add');
    Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
});

