<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayarans')->insert([
            [
                'total_makanan' => 100000,
                'total_minuman' => 50000,
                'total_side' => 50000,
                'total_pembayaran' => 200000,
                'pajak' => 20000,
                'tanggal_pembayaran' => '2021-03-29 18:00:00',
                'no_kartu' => '123123123',
                'nama_pemilik' => 'ahmad',
                'kode_verif' => '123123',
            ],
            [
                'total_makanan' => 10000,
                'total_minuman' => 50000,
                'total_side' => 5000,
                'total_pembayaran' => 65000,
                'pajak' => 6500,
                'tanggal_pembayaran' => '2021-03-30 18:00:00',
                'no_kartu' => '234234234',
                'nama_pemilik' => 'joko',
                'kode_verif' => '545432',
            ],
            [
                'total_makanan' => 100000,
                'total_minuman' => 20000,
                'total_side' => 30000,
                'total_pembayaran' => 150000,
                'pajak' => 15000,
                'tanggal_pembayaran' => '2021-03-28 18:00:00',
                'no_kartu' => '2323232231',
                'nama_pemilik' => 'topik',
                'kode_verif' => '232323',
            ],
        ]);
    }
}
