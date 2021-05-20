<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stokkeluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bahan')->constrained('bahans');
            $table->integer('hapus')->default(1);
            $table->integer('jumlah_keluar');
            $table->string('jenis_keluar');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stokkeluars');
    }
}
