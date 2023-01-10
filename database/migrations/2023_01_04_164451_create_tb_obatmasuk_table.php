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
        Schema::create('tb_obatmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_obat');
            $table->string('jumlah');
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
        Schema::dropIfExists('tb_obatmasuk');
    }
};
