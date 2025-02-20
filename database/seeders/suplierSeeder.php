<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class suplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        for ($i=0; $i < 100; $i++) { 
            $nama_suplier = 'PT. ' . $faker->company;
            $data[] = [
                'nama_suplier' => $nama_suplier,
                'email' => 'admin.' . strtolower(str_replace(' ', '_', $nama_suplier)) . '@admin.com',
                'alamat' => $faker->address,
                'telp' => $faker->numerify($faker->randomElement([
                    '08##########',
                    '08###########',
                    '08############',
                ])),
                'tgl_terdaftar' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'status' => 'Aktif',
            ];
        }
        DB::table('supliers')->insert($data);
    }
}