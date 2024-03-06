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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('divisi_id');
            $table->integer('nomor_hp');
            $table->string('nama_instansi');
            $table->string('nama_jurusan');
            $table->integer('nim');
            $table->string('link_cv');
            $table->string('link_porto');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->foreign('divisi_id')->references('id')->on('divisis')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
};
