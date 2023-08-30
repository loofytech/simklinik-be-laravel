<?php

namespace App\Http\Controllers;

use App\Models\GeneralInspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralInspectionController extends Controller
{
    public function update(Request $request) {
        try {
            DB::beginTransaction();

            $query = GeneralInspection::where('registration_id', $request->registration_id)->first();
            if (!$query) {
                $query = new GeneralInspection();
                $query->registration_id = $request->registration_id;
            }

            $query->anamnesis = $request->anamnesis;
            $query->objective = $request->objective;
            $query->ku = $request->ku;
            $query->thoraks = $request->thoraks;
            $query->therapy = $request->therapy;
            $query->education = $request->education;
            $query->instruction = $request->instruction;
            $query->abd = $request->abd;
            $query->extremity = $request->extremity;
            $query->working_diagnostics = $request->working_diagnostics;
            $query->diagnosis_name = $request->diagnosis_name;
            $query->physical_examination = $request->physical_examination;
            $query->etc = $request->etc;
            $query->follow_up = $request->follow_up;
            $query->save();

            DB::commit();
            return response()->json(['message' => 'Inspection OK']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
