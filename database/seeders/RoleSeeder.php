<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                "RoleName" => "Admin",
                "RoleSlug" => "admin",
            ],
            [
                "RoleName" => "IT",
                "RoleSlug" => "it",
            ],
            [
                "RoleName" => "Dokter",
                "RoleSlug" => "dokter",
            ],
            [
                "RoleName" => "Administrasi",
                "RoleSlug" => "administrasi",
            ],
            [
                "RoleName" => "Perawat",
                "RoleSlug" => "perawat",
            ],
            [
                "RoleName" => "Apoteker",
                "RoleSlug" => "apoteker",
            ],
            [
                "RoleName" => "Rujukan",
                "RoleSlug" => "rujukan",
            ],
            [
                "RoleName" => "Keuangan",
                "RoleSlug" => "keuangan",
            ],
            [
                "RoleName" => "Kasir",
                "RoleSlug" => "kasir",
            ],
            [
                "RoleName" => "Radiologi",
                "RoleSlug" => "radiologi",
            ],
            [
                "RoleName" => "Laboratorium",
                "RoleSlug" => "laboratorium",
            ],
            [
                "RoleName" => "Fisioterapi",
                "RoleSlug" => "fisioterapi",
            ],
        ];

        foreach ($params as $key => $value) {
            $s = new Role();
            $s->role_name = $value['RoleName'];
            $s->role_slug = $value['RoleSlug'];
            $s->save();
        }
    }
}
