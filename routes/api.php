<?php

use App\Http\Controllers\GeneralActionController;
use App\Http\Controllers\GeneralInspectionController;
use App\Http\Controllers\GeneralRecipeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

Route::group(['prefix' => 'patient'], function() {
    Route::get('/{medicalRecord}', [PatientController::class, 'getPatientByMedicalRecord']);
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
    Route::get('action', [ScreeningController::class, 'getActionByScreeningIsAction1']);
    Route::put('', [ScreeningController::class, 'moveAction']);
    Route::post('', [ScreeningController::class, 'getScreeningById']);
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

// Route::get('hello', function() {
//     $data = File::get('data_diagnosa_icd_10.json');
//     $decode = json_decode($data);
//     $dumpData = [];
//     // $x = Http::get('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q='. 'hello world');
//     // $m = json_decode($x);
//     // return $m[0][0][0];

//     // $r = new GuzzleHttp\Client();

//     if ($decode) {
//         // for ($i = 0; $i < 500; $i++) {
//         //     $x = $r->get('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q=' . $decode->data[$i]->nama, ['timeout' => 3600, 'connect_timeout' => 5]);
//         //     $m = json_decode($x->getBody(), true);
    
//         //     array_push($dumpData, [
//         //         'diagnoses_code' => $decode->data[$i]->kode,
//         //         'diagnoses_name_en' => $decode->data[$i]->nama,
//         //         'diagnoses_name_id' => $m[0][0][0]
//         //     ]);
//         // }
//         foreach ($decode->data as $key => $data) {
//             // $x = $r->get('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q='. $data->nama, [
//             //     'http_errors' => false
//             // ]);
//             // $m = json_decode($x->getBody(), true);
//             $x = Http::withOptions(['debug' => true])->get('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q='. $data->nama);
//             $m = json_decode($x);

//             array_push($dumpData, [
//                 'diagnoses_code' => $data->kode,
//                 'diagnoses_name_en' => $data->nama,
//                 'diagnoses_name_id' => $m[0][0][0]
//             ]);
//             // return response()->json($dumpData);
//         }
//     }

//     return response()->json($dumpData);
// });