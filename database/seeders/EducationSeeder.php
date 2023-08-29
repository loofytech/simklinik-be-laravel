<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2'];

        foreach ($params as $key => $value) {
            $p = new Education();
            $p->education_name = $value;
            $p->education_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
