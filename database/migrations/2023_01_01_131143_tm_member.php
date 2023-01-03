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
        Schema::create('tm_member', function (Blueprint $table) {
            $table->id('id_member');
            $table->string('username');
            $table->string('nama_lengkap');
            $table->string('no_hp');
            $table->string('no_rekening');
            $table->string('alamat_lengkap');
            $table->string('saldo');
            $table->string('password');
            $table->string('kode_referal');
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
        Schema::dropIfExists('tm_member');
    }
};
