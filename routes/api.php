<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'user'], function() {
    Route::post('', [UserController::class, 'store']);
});

Route::group(['prefix' => 'registration'], function() {
    Route::get('', [RegistrationController::class, 'index']);
    Route::post('', [RegistrationController::class, 'store']);
    Route::put('', [RegistrationController::class, 'moveScreening']);
});

Route::group(['prefix' => 'screening'], function() {
    Route::get('', [ScreeningController::class, 'index']);
    Route::put('', [ScreeningController::class, 'moveAction']);
});
