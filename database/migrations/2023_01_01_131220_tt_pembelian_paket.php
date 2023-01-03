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
        Schema::create('tt_pembelian_paket', function (Blueprint $table) {
            $table->id();
            $table->string('id_member');
            $table->string('id_produk');
            $table->string('id_detail_paket');
            $table->string('tanggal_mulai');
            $table->string('tanggal_selesai');
            $table->string('status_pembayaran');
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
        Schema::dropIfExists('tt_pembelian_paket');
    }
};
