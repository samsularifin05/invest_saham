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
        Schema::create('tt_history_pembelian_paket', function (Blueprint $table) {
            $table->id('id_detail_paket');
            $table->string('id_pembelian_paket');
            $table->string('tanggal');
            $table->string('keuntungan_harian');
            $table->string('total_keuntungan');
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
        Schema::dropIfExists('tt_history_pembelian_paket');
    }
};
