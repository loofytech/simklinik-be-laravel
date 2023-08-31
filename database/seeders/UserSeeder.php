<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Kiki Andriawan',
                'email' => 'kiki@gmail.com',
                'password' => '12345',
                'role_id' => 3,
                'unit_id' => 1
            ],
            [
                'name' => 'Wahid Mustaqim',
                'email' => 'wahid@gmail.com',
                'password' => '12345',
                'role_id' => 3,
                'unit_id' => 1
            ]
        ];

        foreach ($params as $key => $value) {
            $p = new User();
            $p->name = $value['name'];
            $p->email = $value['email'];
            $p->password = Hash::make($value['password']);
            $p->role_id = $value['role_id'];
            $p->unit_id = $value['unit_id'];
            $p->save();
        }
    }
}
