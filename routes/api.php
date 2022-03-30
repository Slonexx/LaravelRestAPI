<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\V1\AuthController;
use \App\Http\Controllers\API\V1\UserController;
use \App\Http\Controllers\API\V1\AnimalController;
use \App\Http\Controllers\API\V1\ClinicController;
use \App\Http\Controllers\API\V1\ServiceController;
use \App\Http\Controllers\API\V1\DoctorController;
use \App\Http\Controllers\API\V1\TimeOfReceiptController;
use \App\Http\Controllers\API\V1\RenderServiceController;

Route::post('/Register', [AuthController::class, 'register']);
Route::post('/Login', [AuthController::class, 'login']);

Route::get('/User', [UserController::class, 'index']);
Route::get('/User/{id}', [UserController::class, 'show']);

Route::get('/Animal',[AnimalController::class, 'index']);
Route::get('/Animal/{id}',[AnimalController::class, 'show']);

Route::get('/Clinic',[ClinicController::class, 'index']);
Route::get('/Clinic/{id}',[ClinicController::class, 'show']);

Route::get('/Doctor',[DoctorController::class, 'index']);
Route::get('/Doctor/{id}',[DoctorController::class, 'show']);

Route::get('/Time',[TimeOfReceiptController::class, 'index']);
Route::get('/Time/{id}',[TimeOfReceiptController::class, 'show']);

Route::get('/Service',[ServiceController::class, 'index']);
Route::get('/Service/{id}',[ServiceController::class, 'show']);

Route::get('/Render',[RenderServiceController::class, 'index']);
Route::get('/Render/{id}',[RenderServiceController::class, 'show']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/Logout', [AuthController::class, 'logout']);

    Route::put('/User/{id}', [UserController::class, 'update']);
    Route::delete('/User/{id}', [UserController::class, 'destroy']);

    Route::post('/Animal',[AnimalController::class, 'store']);
    Route::put('/Animal/{id}', [AnimalController::class, 'update']);
    Route::delete('/Animal/{id}',[AnimalController::class, 'destroy']);

    Route::post('/Clinic',[ClinicController::class, 'store']);
    Route::put('/Clinic/{id}',[ClinicController::class, 'update']);
    Route::delete('/Clinic/{id}',[ClinicController::class, 'destroy']);

    Route::post('/Doctor',[DoctorController::class, 'store']);
    Route::put('/Doctor/{id}', [DoctorController::class, 'update']);
    Route::delete('/Doctor/{id}', [DoctorController::class, 'destroy']);

    Route::post('/Time',[TimeOfReceiptController::class, 'store']);
    Route::put('/Time/{id}', [TimeOfReceiptController::class, 'update']);
    Route::delete('/Time/{id}',[TimeOfReceiptController::class, 'destroy']);

    Route::post('/Service',[ServiceController::class, 'store']);
    Route::put('/Service/{id}', [ServiceController::class, 'update']);
    Route::delete('/Service/{id}', [ServiceController::class, 'destroy']);

    Route::post('/Render',[RenderServiceController::class, 'store']);
    Route::delete('/Render/{id}',[RenderServiceController::class, 'destroy']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
