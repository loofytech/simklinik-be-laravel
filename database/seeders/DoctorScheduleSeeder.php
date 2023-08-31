<?php

namespace Database\Seeders;

use App\Models\DoctorSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
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
                'user_id' => 1,
                'service_id' => 1,
                'day' => 'Senin',
                'start' => '14:00',
                'end' => '16:00'
            ],
            [
                'user_id' => 2,
                'service_id' => 1,
                'day' => 'Senin',
                'start' => '14:00',
                'end' => '16:00'
            ]
        ];

        foreach ($params as $key => $value) {
            $p = new DoctorSchedule();
            $p->user_id = $value['user_id'];
            $p->service_id = $value['service_id'];
            $p->day = $value['day'];
            $p->start = $value['start'];
            $p->end = $value['end'];
            $p->save();
        }
    }
}
