<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this-> call([
            KaryawanSeeder::class,
            PelangganSeeder::class,
            MejaSeeder::class,
            ReservasiSeeder::class,
            PembayaranSeeder::class,
            PesananSeeder::class,
            MenuSeeder::class,
            BahanSeeder::class,
            DetailPesananSeeder::class,
            StokKeluarSeeder::class,
            StokMasukSeeder::class,
        ]);
    }
}
