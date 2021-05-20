<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('reservasis', function (Blueprint $table) {
            $table->id();
            $table->integer('hapus')->default(1);
            $table->foreignId('id_meja')->constrained('mejas');
            $table->foreignId('id_pelanggan')->constrained('pelanggans');
            $table->foreignId('id_karyawan')->constrained('karyawans');
            $table->string('sesi');
            $table->date('tanggal')->nullable();
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('reservasis');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
