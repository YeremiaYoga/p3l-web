<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert([
            [
                'nama_pelanggan' => 'ahmad',
                'no_pelanggan' => '0010101',
                'email_pelanggan' => 'qq@gmail.com',
                
            ],
            [
                'nama_pelanggan' => 'joko',
                'no_pelanggan' => '1231231',
                'email_pelanggan' => 'qweqqq@gmail.com',
                
            ],
            [
                'nama_pelanggan' => 'topik',
                'no_pelanggan' => '1231231',
                'email_pelanggan' => 'qsdasq@gmail.com',
                
            ],
        ]);
    }
}
