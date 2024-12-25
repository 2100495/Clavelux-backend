<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VisitorController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/auth', function (){
    return response(200);
})->middleware('auth:sanctum');

Route::post('/login',[LoginController::class,'login']);
Route::post('/contact_login',[LoginController::class,'contact_login']);
Route::post('/visitor/signup',[VisitorController::class,'signup']);
Route::post('/schedule',[ScheduleController::class,'schedule']);
Route::get('/get_schedule/{visitor_id}',[ScheduleController::class,'get_schedule']);



Route::get('/get_all_schedule_contact/{contact_id}',[ScheduleController::class,'get_all_schedule_contact']);

Route::get('/get_schedule_contact/{contact_id}',[ScheduleController::class,'get_schedule_contact']);
Route::get('/schedule_accepted/{contact_id}',[ScheduleController::class,'schedule_accepted']);
Route::get('/schedule_denied/{contact_id}',[ScheduleController::class,'schedule_denied']);


Route::post('/schedule_action',[ScheduleController::class,'schedule_action']);
Route::post('/accept_schedule',[ScheduleController::class,'accept_schedule']);
Route::post('/deny_schedule',[ScheduleController::class,'deny_schedule']);