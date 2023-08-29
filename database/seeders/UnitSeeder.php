<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Nakes', 'Non Nakes'];

        foreach ($params as $key => $value) {
            $s = new Unit();
            $s->unit_name = $value;
            $s->unit_slug = Str::slug($value, '_');
            $s->save();
        }
    }
}
