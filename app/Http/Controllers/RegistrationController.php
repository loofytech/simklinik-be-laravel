<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Registration;
use App\Models\Screening;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function index(Request $request) {
        $data = Registration::with('patient', 'doctor', 'service', 'payment')->whereDate('created_at', Carbon::today())->where('is_ready_screening', 0)->paginate(10);
        if ($request->page > $data->lastPage()) abort(404, 'Page not found');

        return response()->json($data);
    }

    public function store(Request $request) {
        // return response()->json(['message' => $request->medical_record ? true : false], 400);
        try {
            DB::beginTransaction();

            $patientData = null;
            if ($request->medical_record) $patientData = $this->updatePatient($request->all());
            else $patientData = $this->storePatient($request->all());

            if (!$patientData) throw new \Exception('Error storing patient data');
            // return response()->json(['message' => $patientData], 400);

            $register = new Registration();
            $register->service_id = $request->service_id;
            $register->payment_id = $request->payment_id;
            $register->patient_id = $patientData->id;
            $register->doctor_id = $request->doctor_id;
            $register->responsible_name = $request->responsible_name;
            $register->responsible_phone = $request->responsible_phone;
            $register->responsible_address = $request->responsible_address;
            $register->responsible_relation = $request->responsible_relation;
            $register->save();

            DB::commit();
            return response()->json(['message' => 'Registration OK']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function moveScreening(Request $request) {
        try {
            DB::beginTransaction();

            $register = Registration::find($request->registration_id);
            if (!$register) throw new \Exception('Error registration not found');

            $register->is_ready_screening = 1;
            $register->save();

            $screening = new Screening();
            $screening->registration_id = $register->id;
            $screening->body_weight = 0;
            $screening->body_height = 0;
            $screening->body_temperature = 0;
            $screening->body_breath = 0;
            $screening->body_pulse = 0;
            $screening->body_blood_pressure_mm = 0;
            $screening->body_blood_pressure_hg = 0;
            $screening->body_imt = 0;
            $screening->body_oxygen_saturation = 0;
            $screening->body_diabetes = '0';
            $screening->body_haemopilia = '0';
            $screening->body_heart_desease = '0';
            $screening->abdominal_circumference = 0;
            $screening->save();

            DB::commit();
            return response()->json(['message' => 'Move screening']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    private function storePatient($data) {
        try {
            DB::beginTransaction();

            $fPatient = DB::table('patients')->latest('id')->pluck('medical_record');
            $rmCode = str_pad($fPatient->count() < 1 ? 1 : (int) $fPatient[0] + 1, 6, '0', STR_PAD_LEFT);

            $patient = new Patient();
            $patient->medical_record = $rmCode;
            $patient->patient_name = $data['patient_name'];
            $patient->patient_phone = $data['patient_phone'];
            $patient->patient_nik = $data['patient_nik'];
            $patient->patient_gender = $data['patient_gender'];
            $patient->birth_place = $data['birth_place'];
            $patient->birth_date = $data['birth_date'];
            $patient->address = $data['patient_address'];
            $patient->province = $data['province'];
            $patient->regency = $data['regency'];
            $patient->district = $data['district'];
            $patient->subdistrict = $data['subdistrict'];
            // $patient->blood_type = $data['blood_type'];
            $patient->religion = $data['religion'];
            $patient->ethnic = $data['ethnic'];
            $patient->marital_status = $data['marital_status'];
            $patient->job = $data['job'];
            $patient->education = $data['education'];
            $patient->save();

            DB::commit();
            return (object) $patient;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    private function updatePatient($data) {
        try {
            DB::beginTransaction();

            $patient = Patient::where('medical_record', $data['medical_record'])->first();
            if (!$patient) throw new \Exception('Error patient not found');

            $patient->patient_name = $data['patient_name'];
            $patient->patient_phone = $data['patient_phone'];
            $patient->patient_nik = $data['patient_nik'];
            $patient->patient_gender = $data['patient_gender'];
            $patient->birth_place = $data['birth_place'];
            $patient->birth_date = $data['birth_date'];
            $patient->address = $data['patient_address'];
            $patient->province = $data['province'];
            $patient->regency = $data['regency'];
            $patient->district = $data['district'];
            $patient->subdistrict = $data['subdistrict'];
            // $patient->blood_type = $data['blood_type'];
            $patient->religion = $data['religion'];
            $patient->ethnic = $data['ethnic'];
            $patient->marital_status = $data['marital_status'];
            $patient->job = $data['job'];
            $patient->education = $data['education'];
            $patient->save();

            DB::commit();
            return (object) $patient;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
