<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Ethnic;
use App\Models\Job;
use App\Models\MaritalStatus;
use App\Models\Religion;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function getReligion() {
        $req = Religion::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getEthnic() {
        $req = Ethnic::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getMaritalStatus() {
        $req = MaritalStatus::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getJob() {
        $req = Job::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getEducation() {
        $req = Education::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getService() {
        $req = Service::all();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getDoctor() {
        $req = User::where('role_id', 3)->get();
        return response()->json(['message' => 'success', 'data' => $req]);
    }

    public function getDoctorByServiceId(Request $request, $doctorId) {}
}
