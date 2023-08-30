<?php

namespace Database\Seeders;

use App\Models\ClinicRates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClinicRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'service_id' => 1,
                'clinic_rate_name' => 'ADMINISTRASI IGD',
                'clinic_rate_slug' => Str::slug('ADMINISTRASI IGD', '-'),
                'clinic_rate_price' => 250000
            ],
            [
                'service_id' => 1,
                'clinic_rate_name' => 'JASA MEDIS IGD',
                'clinic_rate_slug' => Str::slug('JASA MEDIS IGD', '-'),
                'clinic_rate_price' => 150000
            ],
            [
                'service_id' => 1,
                'clinic_rate_name' => 'AFF HEACTING',
                'clinic_rate_slug' => Str::slug('AFF HEACTING', '-'),
                'clinic_rate_price' => 100000
            ],
            [
                'service_id' => 1,
                'clinic_rate_name' => 'AFF - HEACTING (DOKTER)',
                'clinic_rate_slug' => Str::slug('AFF - HEACTING (DOKTER)', '-'),
                'clinic_rate_price' => 100000
            ],
            [
                'service_id' => 1,
                'clinic_rate_name' => 'EKG',
                'clinic_rate_slug' => Str::slug('EKG', '-'),
                'clinic_rate_price' => 100000
            ]
        ];

        foreach ($params as $key => $value) {
            $p = new ClinicRates();
            $p->service_id = $value['service_id'];
            $p->clinic_rate_name = $value['clinic_rate_name'];
            $p->clinic_rate_slug = $value['clinic_rate_slug'];
            $p->clinic_rate_price = $value['clinic_rate_price'];
            $p->save();
        }
    }
}
