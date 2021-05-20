<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pesanans')->insert([
            [
                'id_reservasi' => 1,
                'status' => 1,
                'total_jumlah' => 1,
                'total_pesanan' => 4,
            ],
            [
                'id_reservasi' => 2,
                'status' => 1,
                'total_jumlah' => 3,
                'total_pesanan' => 5,
            ],
            [
                'id_reservasi' => 3,
                'status' => 0,
                'total_jumlah' => 2,
                'total_pesanan' => 5,
            ],
        ]);
    }
}
