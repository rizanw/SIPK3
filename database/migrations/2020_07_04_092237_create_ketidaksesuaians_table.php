<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetidaksesuaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketidaksesuaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('temuan');
            $table->date('tanggal');
            $table->string('kategori');
            $table->string('lokasi');
            $table->string('photo')->nullable();
            $table->unsignedSmallInteger('resiko_keparahan')->nullable();
            $table->unsignedSmallInteger('resiko_kemungkinan')->nullable();
            $table->string('pic')->nullable();
            $table->string('pelapor')->nullable();
            $table->string('tindakan');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('ketidaksesuaians');
    }
}
