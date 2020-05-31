<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebakaranAktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebakaran_aktif_apars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_apar');
            $table->date('tanggal_inspeksi');
            $table->tinyInteger('a');
            $table->tinyInteger('b');
            $table->tinyInteger('c');
            $table->tinyInteger('d');
            $table->tinyInteger('e');
            $table->tinyInteger('f');
            $table->tinyInteger('g');
            $table->tinyInteger('h');
            $table->tinyInteger('i');
            $table->timestamps();

            $table->foreign('id_apar')->references('id')->on('alat_kebakaran_apars')->onDelete('cascade');
        });

        Schema::create('kebakaran_aktif_hydrants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_hydrant');
            $table->date('tanggal_inspeksi');
            $table->tinyInteger('a');
            $table->tinyInteger('b');
            $table->tinyInteger('c');
            $table->tinyInteger('d');
            $table->tinyInteger('e');
            $table->tinyInteger('f');
            $table->tinyInteger('g');
            $table->tinyInteger('h');
            $table->tinyInteger('i');
            $table->tinyInteger('j');
            $table->tinyInteger('k');
            $table->tinyInteger('l');
            $table->tinyInteger('m');
            $table->tinyInteger('n');
            $table->tinyInteger('o');
            $table->tinyInteger('p');
            $table->tinyInteger('q');
            $table->timestamps();

            $table->foreign('id_hydrant')->references('id')->on('alat_kebakaran_hydrants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebakaran_aktif_apars');
        Schema::dropIfExists('kebakaran_aktif_hydrants');
    }
}
