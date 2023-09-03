<?php

namespace Database\Seeders;

use App\Models\Diagnoses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DiagnosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = File::get('public/data_diagnosa_icd_10.json');
        $decode = json_decode($data);
        // $dumpData = [];

        foreach ($decode->data as $key => $data) {
            $d = new Diagnoses();
            // $x = $r->get('https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=id&dt=t&q=' . $data->nama, ['timeout' => 3600, 'connect_timeout' => 5]);
            // $m = json_decode($x->getBody(), true);

            // array_push($dumpData, [
            //     'diagnoses_code' => $data->kode,
            //     'diagnoses_name_en' => $data->nama,
            //     'diagnoses_name_id' => $m[0][0][0]
            // ]);
            // return response()->json($dumpData);
            $d->diagnoses_code = $data->kode;
            $d->diagnoses_name_en = $data->nama;
            $d->save();
        }
    }
}
