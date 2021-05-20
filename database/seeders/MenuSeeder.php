<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'nama_menu' => 'Beef Short plate',
                'deskripsi_menu' => 'Potongan daging sapi dari bagian otot perut, bentuknya panjang dan datar',
                'kategori' => 'makanan',
                'harga' => 20000,
            ],
            [
                'nama_menu' => 'Kimchi',
                'deskripsi_menu' => 'Asinan sayur hasil fermentasi yang diberi bumbu pedas',
                'kategori' => 'sidedish',
                'harga' => 5000,
            ],
            [
                'nama_menu' => 'Ocha',
                'deskripsi_menu' => 'Minuman teh hijau segar',
                'kategori' => 'minuman',
                'harga' => 3000,
            ],

        ]);
    }
}
