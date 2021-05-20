<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stokmasuks')->insert([
            [
                'id_bahan' => 1,
                'jumlah_masuk' => 300,
                'sisa_stok' => 20,
                'harga_bahan' => 8000,
            ],
            [
                'id_bahan' => 2,
                'jumlah_masuk' => 30,
                'sisa_stok' => 120,
                'harga_bahan' => 3500,
            ],
            [
                'id_bahan' => 3,
                'jumlah_masuk' => 50,
                'sisa_stok' => 100,
                'harga_bahan' => 4000,
            ],
        ]);
    }
}
