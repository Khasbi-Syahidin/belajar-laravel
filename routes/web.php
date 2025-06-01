<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return view('hello');
});


Route::get('/show', [WelcomeController::class, 'show']);
