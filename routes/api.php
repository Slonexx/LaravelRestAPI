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
use \App\Http\Controllers\API\V1\FileController;

// Public
Route::post('/Register', [AuthController::class, 'register']);
Route::post('/Login', [AuthController::class, 'login']);

Route::post('/ChangeFileUser/{id}', [FileController::class, 'ChangeFileUser']);
Route::post('/ChangeFileClinic/{id}', [FileController::class, 'ChangeFileClinic']);

Route::get('/DownLoadFileUser/{id}', [FileController::class, 'DownLoadFileUser']);
Route::get('/DownLoadFileClinic/{id}', [FileController::class, 'DownLoadFileClinic']);

Route::apiResource('/User', UserController::class)->except(['index, show, update, destroy']);
Route::apiResource('/Animal', AnimalController::class)->except(['index, show, store, update, destroy']);
Route::apiResource('/Clinic', ClinicController::class)->except(['index, show, store, update, destroy']);
Route::apiResource('/Doctor', DoctorController::class)->except(['index, show, store, update, destroy']);
Route::apiResource('/Time', TimeOfReceiptController::class)->except(['index, show, store, update, destroy']);
Route::apiResource('/Service', ServiceController::class)->except(['index, show, store, update, destroy']);
Route::apiResource('/Render', RenderServiceController::class)->except(['index, show, store, destroy']);


Route::post('/Logout', [AuthController::class, 'logout']);

Route::post('/UserRestore/{id}', [UserController::class, 'restore']);
Route::post('/AnimalRestore/{id}', [AnimalController::class, 'restore']);
Route::post('/ClinicRestore/{id}', [ClinicController::class, 'restore']);
Route::post('/DoctorRestore/{id}', [DoctorController::class, 'restore']);
Route::post('/TimeRestore/{id}', [TimeOfReceiptController::class, 'restore']);
Route::post('/ServiceRestore/{id}', [ServiceController::class, 'restore']);
Route::post('/RenderRestore/{id}', [RenderServiceController::class, 'restore']);

Route::get('/RenderOrderBy', [RenderServiceController::class, 'OrderBy']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
});

