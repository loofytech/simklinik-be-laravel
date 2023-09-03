<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UnitSeeder::class,
            EthnicSeeder::class,
            EducationSeeder::class,
            MaritalStatusSeeder::class,
            JobSeeder::class,
            ServiceSeeder::class,
            PaymentSeeder::class,
            ClinicRateSeeder::class,
            MedicineSeeder::class,
            UserSeeder::class,
            DoctorScheduleSeeder::class,
            DiagnosesSeeder::class,
        ]);
    }
}
