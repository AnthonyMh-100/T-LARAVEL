<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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
// ROUTE LOGIN
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'user_login'])->name('user_login');
Route::post('/register', [UserController::class, 'user_register'])->name('user_register');


Route::middleware('auth')->group(function () {

    Route::get('/', [TaskController::class, 'tasks'])->name('tasks');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::get('/tasks/add', [TaskController::class, 'add'])->name('add');
    Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::post('/tasks/search', [TaskController::class, 'search'])->name('search');
    Route::post('/tasks/post', [TaskController::class, 'store'])->name('post');
    Route::post('/tasks/update', [TaskController::class, 'update'])->name('update');
    Route::get('/check/tasks', [TaskController::class, 'check_task'])->name('check');
    Route::get('/check/{value}', [TaskController::class, 'check_button'])->name('check_button');
    Route::get('/tasks/{id}', [TaskController::class, 'destroy'])->name('destroy');
    Route::get('/logout', [UserController::class, 'user_logout'])->name('user_logout');

});


