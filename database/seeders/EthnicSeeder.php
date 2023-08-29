<?php

namespace Database\Seeders;

use App\Models\Ethnic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Jawa', 'Sunda', 'Lampung', 'Baduy'];

        foreach ($params as $key => $value) {
            $p = new Ethnic();
            $p->ethnic_name = $value;
            $p->ethnic_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
