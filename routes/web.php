<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WelcomeController;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return view('hello');
});

Route::get('/show', [WelcomeController::class, 'show']);


Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('index');
    Route::get('/create', function () {
        return view('staff.create');
    })->name('create');
    Route::post('/store', [StaffController::class, 'store'])->name('store');
    Route::get('/{id}', [StaffController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [StaffController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [StaffController::class, 'delete'])->name('delete');
});

Route::post('/process/logout', [LoginController::class, 'logout'])->name('process.logout')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');

    Route::post('/process/login', [LoginController::class, 'login'])->name('process.login');
});