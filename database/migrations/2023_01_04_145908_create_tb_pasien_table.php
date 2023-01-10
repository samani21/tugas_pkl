<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('nik');
            $table->string('jenis');
            $table->string('bpjs');
            $table->string('nama');
            $table->string('tanggal');
            $table->string('jk');
            $table->string('tempat');
            $table->string('alamat');
            $table->string('darah');
            $table->string('hp');
            $table->string('tgl');
            $table->string('bulan');
            $table->string('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pasien');
    }
};
