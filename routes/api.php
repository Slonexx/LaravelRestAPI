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

// Public
Route::post('/Register', [AuthController::class, 'register']);
Route::post('/Login', [AuthController::class, 'login']);

Route::apiResource('/User', UserController::class)->except(['index, show']);

Route::apiResource('/Animal', AnimalController::class)->except(['index, show']);

Route::apiResource('/Clinic', ClinicController::class)->except(['index, show']);

Route::apiResource('/Doctor', DoctorController::class)->except(['index, show']);

Route::apiResource('/Time', TimeOfReceiptController::class)->except(['index, show']);

Route::apiResource('/Service', ServiceController::class)->except(['index, show']);

Route::apiResource('/Render', RenderServiceController::class)->except(['index, show']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/Logout', [AuthController::class, 'logout']);

    Route::apiResource('/User', UserController::class)->except(['update, destroy']);
    Route::post('/UserRestore/{id}', [UserController::class, 'restore']);

    Route::apiResource('/Animal', AnimalController::class)->except(['store, update, destroy']);
    Route::post('/AnimalRestore/{id}', [AnimalController::class, 'restore']);

    Route::apiResource('/Clinic', ClinicController::class)->except(['store, update, destroy, restore']);
    Route::post('/ClinicRestore/{id}', [ClinicController::class, 'restore']);

    Route::apiResource('/Doctor', DoctorController::class)->except(['store, update, destroy']);
    Route::post('/DoctorRestore/{id}', [DoctorController::class, 'restore']);

    Route::apiResource('/Time', TimeOfReceiptController::class)->except(['store, update, destroy']);
    Route::post('/TimeRestore/{id}', [TimeOfReceiptController::class, 'restore']);

    Route::apiResource('/Service', ServiceController::class)->except(['store, update, destroy']);
    Route::post('/ServiceRestore/{id}', [ServiceController::class, 'restore']);

    Route::apiResource('/Render', RenderServiceController::class)->except(['store, destroy']);
    Route::post('/RenderRestore/{id}', [RenderServiceController::class, 'restore']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
