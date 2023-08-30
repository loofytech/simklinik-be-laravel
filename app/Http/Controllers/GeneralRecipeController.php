<?php

namespace App\Http\Controllers;

use App\Models\GeneralRecipe;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralRecipeController extends Controller
{
    public function index(Request $request) {
        $p = GeneralRecipe::where('registration_id', $request->registration_id)->get();
        return response()->json(['data' => $p]);
    }

    public function update(Request $request) {
        try {
            DB::beginTransaction();

            $query = GeneralRecipe::where('registration_id', $request->registration_id)->first();
            if ($query) {
                GeneralRecipe::where('registration_id', $request->registration_id)->delete();
            }

            foreach ($request->recipes as $key => $value) {
                $q = Medicine::find($value['medicine_id']);
                if (!$q) throw new \Exception('Error obat not found');

                $query = new GeneralRecipe();
                $query->registration_id = $request->registration_id;
                $query->medicine_id = $q->id;
                $query->quantity = $value['quantity'];
                $query->how_to_use = $value['how_to_use'];
                $query->sub_total = 2 * $q->medicine_price_hna;
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
