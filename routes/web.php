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

Route::get('/staff', function () {
    return view('staff', [
        'staffs' => Staff::all()
    ]);
});

Route::get('/staff/create', function () {
    return view('staff.create');
})->name('staff.create');

Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');