<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register',  'register')->name('register.post');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login',  'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');

});



Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('tasks.index');
    Route::post('/tasks', 'store')->name('tasks.store');
    Route::get('/tasks/{task}/edit', 'edit')->name('tasks.edit');
    Route::put('/tasks/{task}', 'update')->name('tasks.update');
    Route::delete('/tasks/{task}', 'destroy')->name('tasks.destroy');
});

