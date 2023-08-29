<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = ['Cash', 'Insurance'];

        foreach ($params as $key => $value) {
            $p = new Payment();
            $p->payment_name = $value;
            $p->payment_slug = Str::slug($value, '-');
            $p->save();
        }
    }
}
