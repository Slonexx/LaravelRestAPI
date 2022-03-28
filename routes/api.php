<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\V1\AuthController;
use \App\Http\Controllers\API\V1\UserController;

Route::post('/Register', [AuthController::class, 'register']);
Route::post('/Login', [AuthController::class, 'login']);
Route::get('/User', [UserController::class, 'index']);
Route::get('/User/{id}', [UserController::class, 'show']);
Route::get('/User/search/{name}', [UserController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/User', [UserController::class, 'store']);
    Route::put('/User/{id}', [UserController::class, 'update']);
    Route::delete('/User/{id}', [UserController::class, 'destroy']);
    Route::post('/Logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
