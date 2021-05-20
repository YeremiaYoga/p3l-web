<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahans')->insert([
            [
                'nama_bahan' => 'Beef Short plate',
                'jumlah_bahan' => '1000',
                'ukuran_penyajian' => '50',
                'unit' => 'gram',
                'id_menu' => 1,
            ],
            [
                'nama_bahan' => 'Kimchi',
                'jumlah_bahan' => '1000',
                'ukuran_penyajian' => '15',
                'unit' => 'gram',
                'id_menu' => 2,
            ],
            [
                'nama_bahan' => 'Ocha',
                'jumlah_bahan' => '10000',
                'ukuran_penyajian' => '200',
                'unit' => 'ml',
                'id_menu' => 3,
            ],

        ]);
    }
}
