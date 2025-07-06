<?php

use App\Models\Staff;
use App\Http\Controllers\Api\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return response()->json([
        'data' => []
    ]);
});


Route::get('/staff', [StaffController::class, 'index']);
Route::get('/staff/{key}', [StaffController::class, 'find']);
Route::post('/staff', [StaffController::class, 'create']);
Route::post('/staff/{id}/update', [StaffController::class, 'update']);
Route::delete('/staff/{id}', [StaffController::class, 'delete']);
