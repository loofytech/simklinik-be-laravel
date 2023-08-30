<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedicineSeeder extends Seeder
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
                'medicine_name' => 'LECOZINC',
                'medicine_price_hna' => 300,
                'medicine_price_hpp' => 270,
                'medicine_stock' => 1000,
            ],
            [
                'medicine_name' => 'ACETYLCISTEINE 200',
                'medicine_price_hna' => 1500,
                'medicine_price_hpp' => 1400,
                'medicine_stock' => 1000,
            ],
            [
                'medicine_name' => 'ACIFAR 400',
                'medicine_price_hna' => 600,
                'medicine_price_hpp' => 500,
                'medicine_stock' => 1000,
            ],
        ];

        foreach ($params as $key => $value) {
            $p = new Medicine();
            $p->medicine_name = $value['medicine_name'];
            $p->medicine_slug = Str::slug($value['medicine_name'], '-');
            $p->medicine_price_hna = $value['medicine_price_hna'];
            $p->medicine_price_hpp = $value['medicine_price_hpp'];
            $p->medicine_stock = $value['medicine_stock'];
            $p->save();
        }
    }
}
