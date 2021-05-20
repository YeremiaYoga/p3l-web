<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detailpesanans')->insert([
            [
                'id_menu' => 1,
                'id_pesanan' => 1,
                'status' => 1,
                'jumlah_pesanan' => 5,
            ],
            [
                'id_menu' => 2,
                'id_pesanan' => 2,
                'status' => 1,
                'jumlah_pesanan' => 2,
            ],
            [
                'id_menu' => 3,
                'id_pesanan' => 3,
                'status' => 0,
                'jumlah_pesanan' => 3,
            ],
        ]);
    }
}
