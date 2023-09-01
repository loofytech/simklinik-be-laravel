<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Screening;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreeningController extends Controller
{
    public function index() {
        $data = Screening::with('registration.patient', 'registration.service', 'registration.doctor')->whereDate('created_at', Carbon::today())->where('is_ready_action', 0)->get();
        return response()->json(['message' => 'success', 'data' => $data]);
    }

    public function getScreeningById(Request $request) {
        $data = Screening::with('registration.patient', 'registration.service', 'registration.doctor')->where('id', $request->screening_id)->first();
        return response()->json(['data' => $data]);
    }

    public function moveAction(Request $request) {
        try {
            DB::beginTransaction();

            $screening = Screening::with('registration.patient')->where('registration_id', $request->registration_id)->first();
            if (!$screening) throw new \Exception('Error screening not found');

            $screening->body_weight = $request->body_weight;
            $screening->body_height = $request->body_height;
            $screening->body_temperature = $request->body_temperature;
            $screening->body_breath = $request->body_breath;
            $screening->body_pulse = $request->body_pulse;
            $screening->body_blood_pressure_mm = $request->body_blood_pressure_mm;
            $screening->body_blood_pressure_hg = $request->body_blood_pressure_hg;
            $screening->body_imt = $request->body_imt;
            $screening->body_oxygen_saturation = $request->body_oxygen_saturation;
            $screening->body_diabetes = $request->body_diabetes;
            $screening->body_haemopilia = $request->body_haemopilia;
            $screening->body_heart_desease = $request->body_heart_desease;
            $screening->abdominal_circumference = $request->abdominal_circumference;
            $screening->history_other_desease = $request->history_other_desease;
            $screening->history_treatment = $request->history_treatment;
            $screening->allergy_medicine = $request->allergy_medicine;
            $screening->allergy_food = $request->allergy_food;
            $screening->is_ready_action = 1;
            $screening->save();

            if ($request->blood_type && $request->blood_type != "") {
                $patient = Patient::where('id', $screening->registration->patient->id)->first();
                if (!$patient) throw new \Exception('Error patient not found');

                $patient->blood_type = $request->blood_type;
                $patient->save();
            }

            DB::commit();
            return response()->json(['message' => 'Screening OK']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
