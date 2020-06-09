<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecelakaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecelakaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kejadian');
            $table->string('lokasi');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('atasan_langsung_korban');
            $table->string('saksi');
            $table->string('akibat');
            $table->unsignedSmallInteger('jumlah_korban');
            $table->string('kronologi');
            $table->unsignedSmallInteger('resiko_keparahan');
            $table->unsignedSmallInteger('resiko_kemungkinan');
            $table->string('photo');
            $table->string('tindakan');
            $table->string('penanggung_jawab');
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('kecelakaan_korbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_inspeksi');
            $table->string('nama');
            $table->string('usia');
            $table->string('jenis_kelamin');
            $table->string('akibat_yang_ditimbulkan');

            $table->foreign('id_inspeksi')
                ->references('id')
                ->on('kecelakaans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecelakaans');
        Schema::dropIfExists('kecelakaan_korbans');
    }
}
