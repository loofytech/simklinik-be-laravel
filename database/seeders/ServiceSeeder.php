<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Pelayanan Umum', 'Pelayanan Gigi'];

        foreach ($params as $key => $value) {
            $p = new Service();
            $p->service_name = $value;
            $p->service_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
