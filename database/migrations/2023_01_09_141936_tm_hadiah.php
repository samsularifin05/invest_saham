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
        Schema::create('tm_hadiah', function (Blueprint $table) {
            $table->id('id_tm_hadiah');
            $table->string('total_nominal_hadiah');
            $table->string('kouta');
            $table->string('nominal_hadiah_permember');
            $table->string('kode_hadiah');
            $table->string('kuota_terpenuhi');
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
        Schema::dropIfExists('tm_hadiah');
    }
};
