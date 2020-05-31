<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatKebakaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alat_kebakaran_apars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('jenis');
            $table->string('berat');
            $table->string('lokasi');
            $table->timestamps();
        });

        Schema::create('alat_kebakaran_hydrants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('lokasi');
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
        Schema::dropIfExists('alat_kebakaran_apars');
        Schema::dropIfExists('alat_kebakaran_hydrants');
    }
}
