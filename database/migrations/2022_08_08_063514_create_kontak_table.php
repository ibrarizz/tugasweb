<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            // set foreign key
            $table->unsignedBigInteger('siswa_id');
            // foreign id_siswa refrensi id di table siswa
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->unsignedBigInteger('jenis_kontak_id');
            // foreign jenis_kontak_id refrensi id di table jenis_kontak
            $table->foreign('jenis_kontak_id')->references('id')->on('jenis_kontak');
            $table->char('deskripsi');
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
        Schema::dropIfExists('kontak');
    }
}
