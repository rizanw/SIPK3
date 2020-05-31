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
            $table->string('pic');
            $table->string('pelapor');
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
