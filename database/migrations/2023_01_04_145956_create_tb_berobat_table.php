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
        Schema::create('tb_berobat', function (Blueprint $table) {
            $table->id();
            $table->string('pasien_id');
            $table->string('no');
            $table->string('nik');
            $table->string('jenis');
            $table->string('bpjs');
            $table->string('umum');
            $table->string('nama');
            $table->string('tanggal');
            $table->string('tgl');
            $table->string('tempat');
            $table->string('alamat');
            $table->string('darah');
            $table->string('hp');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('status');
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
        Schema::dropIfExists('tb_berobat');
    }
};
