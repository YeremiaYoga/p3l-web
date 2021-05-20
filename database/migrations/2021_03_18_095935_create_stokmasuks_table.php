<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stokmasuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bahan')->constrained('bahans');
            $table->integer('hapus')->default(1);
            $table->integer('jumlah_masuk');
            $table->integer('sisa_stok');
            $table->double('harga_bahan');
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
        Schema::dropIfExists('stokmasuks');
    }
}
