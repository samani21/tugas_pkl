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
        Schema::create('tb_pelayanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip','30');
            $table->string('nama','50');
            $table->string('kelompok','50');
            $table->string('spesialis','50');
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
        Schema::dropIfExists('tb_pelayanan');
    }
};
