<?php

namespace App\Http\Controllers;

use App\Models\ClinicRates;
use App\Models\GeneralAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralActionController extends Controller
{
    public function update(Request $request) {
        try {
            DB::beginTransaction();

            $query = GeneralAction::where('registration_id', $request->registration_id)->first();
            if ($query) {
                GeneralAction::where('registration_id', $request->registration_id)->delete();
            }

            foreach ($request->actions as $key => $value) {
                $q = ClinicRates::find($value['clinic_rate_id']);
                if (!$q) throw new \Exception('Error clinic rate not found');

                $query = new GeneralAction();
                $query->registration_id = $request->registration_id;
                $query->clinic_rate_id = $value['clinic_rate_id'];
                $query->quantity = $value['quantity'];
                $query->nakes_first = $value['nakes_first'];
                $query->nakes_second = $value['nakes_second'];
                $query->sub_total = 2 * $q->clinic_rate_price;
                $query->save();
            }

            DB::commit();
            return response()->json(['message' => 'Action OK']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
