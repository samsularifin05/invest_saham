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
        Schema::create('tm_paket', function (Blueprint $table) {
            $table->id('id_paket');
            $table->string('nama_produk');
            $table->string('harga_produk');
            $table->string('keuntungan_harian');
            $table->string('total_keunutngan');
            $table->string('masa_kontrak');
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
        Schema::dropIfExists('tm_paket');

    }
};
