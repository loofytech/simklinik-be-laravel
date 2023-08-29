<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Menikah', 'Belum Menikah'];

        foreach ($params as $key => $value) {
            $p = new MaritalStatus();
            $p->marital_status_name = $value;
            $p->marital_status_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
