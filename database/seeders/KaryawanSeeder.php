<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'nama_karyawan' => 'gedang',
                'no_telepon' => '696969',
                'jabatan' => 'boss',
                'email_karyawan' => 'gg@gmail.com',
                'password' => bcrypt('mbokmu'),
            ],
            [
                'nama_karyawan' => 'joko',
                'no_telepon' => '123123',
                'jabatan' => 'budak',
                'email_karyawan' => 'g212g@gmail.com',
                'password' => bcrypt('mbokmu'),
            ],
            [
                'nama_karyawan' => 'koplo',
                'no_telepon' => '421212',
                'jabatan' => 'kuli',
                'email_karyawan' => 'gaag@gmail.com',
                'password' => bcrypt('mbokmu'),
            ],

        ]);
    }
}
