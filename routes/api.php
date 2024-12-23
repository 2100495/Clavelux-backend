<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/auth', function (){
    return response(200);
})->middleware('auth:sanctum');

Route::post('/login',[LoginController::class,'login']);
Route::post('/schedule',[ScheduleController::class,'schedule']);
Route::post('/notification',[ScheduleController::class,'notification']);