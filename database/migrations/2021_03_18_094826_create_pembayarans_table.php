<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('hapus')->default(1);
            $table->double('total_makanan')->default(0);
            $table->double('total_minuman')->default(0);
            $table->double('total_side')->default(0);
            $table->double('total_pembayaran');
            $table->double('pajak');
            $table->timestamp('tanggal_pembayaran');
            $table->string('no_kartu');
            $table->string('nama_pemilik');
            $table->string('kode_verif');
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
        Schema::dropIfExists('pembayarans');
    }
}
