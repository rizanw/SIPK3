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
            $table->string('tempat_kejadian');
            $table->string('tanggal_kejadian');
            $table->string('jam_kejadian');
            $table->string('atasan_langsung_korban');
            $table->string('saksi');
            $table->string('jumlah_korban');
            $table->string('tanggal_laporan_dibuat');
            $table->string('kronologi_kecelakaan');
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
