<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservasis')->insert([
            [
                'id_meja' => '1',
                'id_pelanggan' => '1',
                'id_karyawan' => '1',
                'sesi' => '11:00',
                'tanggal' => Carbon::now()->toDateTimeString(),
                'status' => 1,
            ],
            [
                'id_meja' => '2',
                'id_pelanggan' => '2',
                'id_karyawan' => '2',
                'sesi' => '19:00',
                'tanggal' => Carbon::now()->toDateTimeString(),
                'status' => 1,
            ],
            [
                'id_meja' => '3',
                'id_pelanggan' => '3',
                'id_karyawan' => '3',
                'sesi' => '10:00',
                'tanggal' => Carbon::now()->toDateTimeString(),
                'status' => 0,
            ],

        ]);
    }
}
