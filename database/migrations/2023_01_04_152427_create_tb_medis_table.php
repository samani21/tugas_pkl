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
        Schema::create('tb_medis', function (Blueprint $table) {
            $table->id();
            $table->string('berobat_id');
            $table->string('pasien_id');
            $table->string('id_diagnosa');
            $table->string('id_obat');
            $table->string('tgl');
            $table->string('poli');
            $table->string('dokter');
            $table->string('perawat');
            $table->string('sistolik');
            $table->string('diastolik');
            $table->string('saturasi');
            $table->string('suhu');
            $table->string('tinggi');
            $table->string('berat');
            $table->string('napas');
            $table->string('status');
            $table->string('biaya');
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
        Schema::dropIfExists('tb_medis');
    }
};
