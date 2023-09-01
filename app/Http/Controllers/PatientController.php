<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getPatientByMedicalRecord(Request $request, $medicalRecord) {
        $data = Patient::where('medical_record', $medicalRecord)->first();
        return response()->json(['data' => $data]);
    }
}
