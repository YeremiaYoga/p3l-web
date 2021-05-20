<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stokkeluars')->insert([
            [
                'id_bahan' => 1,
                'jumlah_keluar' => 300,
                'jenis_keluar' => 'terbuang',
                
            ],
            [
                'id_bahan' => 2,
                'jumlah_keluar' => 200,
                'jenis_keluar' => 'laku',
                
            ],
            [
                'id_bahan' => 3,
                'jumlah_keluar' => 400,
                'jenis_keluar' => 'dicuri',
                
            ],
        ]);
    }
}
