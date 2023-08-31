<?php

use App\Http\Controllers\GeneralActionController;
use App\Http\Controllers\GeneralInspectionController;
use App\Http\Controllers\GeneralRecipeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'select'], function() {
    Route::get('religion', [SelectController::class, 'getReligion']);
    Route::get('ethnic', [SelectController::class, 'getEthnic']);
    Route::get('marital-status', [SelectController::class, 'getMaritalStatus']);
    Route::get('job', [SelectController::class, 'getJob']);
    Route::get('education', [SelectController::class, 'getEducation']);
    Route::get('service', [SelectController::class, 'getService']);
    Route::get('doctor', [SelectController::class, 'getDoctor']);
    Route::get('doctor/{serviceId}', [SelectController::class, 'getDoctorByServiceId']);
});

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

Route::group(['prefix' => 'inspection'], function() {
    Route::post('', [GeneralInspectionController::class, 'index']);
    Route::put('', [GeneralInspectionController::class, 'update']);
});

Route::group(['prefix' => 'action'], function() {
    Route::post('', [GeneralActionController::class, 'index']);
    Route::put('', [GeneralActionController::class, 'update']);
});

Route::group(['prefix' => 'recipe'], function() {
    Route::post('', [GeneralRecipeController::class, 'index']);
    Route::put('', [GeneralRecipeController::class, 'update']);
});
