<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::resource('tasks', TaskController::class)->except(['show'])->middleware('auth');
