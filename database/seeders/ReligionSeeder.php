<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Islam', 'Kristen', 'Budha', 'Konghucu'];

        foreach ($params as $key => $value) {
            $p = new Religion();
            $p->religion_name = $value;
            $p->religion_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
