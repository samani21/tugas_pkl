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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip','20');
            $table->string('nama','20');
            $table->date('tanggal');
            $table->string('tempat','50');
            $table->string('alamat','100');
            $table->string('hp','15');
            $table->string('kelompok','15');
            $table->string('spesialis','15');
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
        Schema::dropIfExists('tb_pegawai');
    }
};
