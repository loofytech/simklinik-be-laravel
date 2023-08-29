<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ["Karyawan Swasta", 'Wirausaha'];

        foreach ($params as $key => $value) {
            $p = new Job();
            $p->job_name = $value;
            $p->job_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
