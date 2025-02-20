<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class stokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data = [];

        $Areas = [
            'Palembang' => 'PLG',
            'Bandung' => 'BDG',
            'Yogyakarta' => 'DIY',
            'Medan' => 'MDN',
            'Papua' => 'PPA',
            'Pekan Baru' => 'PBRU',
            'Aceh' => 'ACH',

        ];
        for ($i=0; $i < 100; $i++) {

            $randomArea = $faker->randomElement($Areas);

            $data[] = [
                'kode_barang' => strtoupper($faker->lexify('???').$faker->unique()->numerify('####')),
                'nama_barang' => $faker->word('10', true),
                'harga' => $faker->numberBetween(10000, 750000),
                'stok' => $faker->numberBetween(10, 70),
                'suplier_id' => $faker->numberBetween(1, 50),
                'cabang' => $randomArea
            ];
        }

        DB::table('stoks')->insert($data);
    }
}
