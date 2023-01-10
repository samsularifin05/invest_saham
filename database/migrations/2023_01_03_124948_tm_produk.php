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
        Schema::create('tm_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('harga_produk');
            $table->string('keuntungan_harian');
            $table->string('total_keuntungan');
            $table->string('masa_kontrak');
            $table->string('image');
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
        Schema::dropIfExists('tm_produk');
    }
};
