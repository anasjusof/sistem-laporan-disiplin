<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pensyarah_id');
            $table->string('semester');
            $table->string('sesi');
            $table->string('nama_pelajar');
            $table->string('no_tentera_kp');
            $table->string('pengambilan');
            $table->string('mata_pelajaran_dan_kod');
            $table->string('nama_bilik_kuliah');
            $table->string('tarikh_dan_masa');
            $table->string('nama_pa');
            $table->string('salah_laku_1');
            $table->string('salah_laku_2');
            $table->string('salah_laku_3');
            $table->string('salah_laku_4');
            $table->string('salah_laku_5');
            $table->string('salah_laku_6');
            $table->string('salah_laku_7');
            $table->string('lain_lain');
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
        Schema::drop('laporans');
    }
}
