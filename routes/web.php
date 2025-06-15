<?php

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

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');

Route::get('/staff/create', function () {
    return view('staff.create');
})->name('staff.create');

Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');

Route::get('/staff/{id}', [StaffController::class, 'edit'])->name('staff.edit');

Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');