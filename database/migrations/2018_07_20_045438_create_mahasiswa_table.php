<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->integer('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi');
            $table->integer('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->integer('angkatan_id');
            $table->foreign('angkatan_id')->references('id')->on('angkatan');
            $table->string('file_name');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('mahasiswa');
    }
}
