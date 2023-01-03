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
        Schema::create('tt_konfirmasi_pembayaran', function (Blueprint $table) {
            $table->id('id_konfirmasi_pembayaran');
            $table->string('id_member');
            $table->string('id_paket');
            $table->string('atas_nama');
            $table->string('no_rekening');
            $table->string('tanggal_transfer');
            $table->string('bukti_transfer');
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
        Schema::dropIfExists('tt_konfirmasi_pembayaran');

    }
};
