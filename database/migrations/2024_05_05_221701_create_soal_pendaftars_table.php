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
        Schema::create('soal_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soal_id');
            $table->unsignedBigInteger('pendaftar_id');
            $table->string('deskripsi_tugas')->nullable();
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_akhir');
            $table->timestamps();
            $table->foreign('soal_id')->references('id')->on('soals')->restrictOnDelete();
            $table->foreign('pendaftar_id')->references('id')->on('pendaftars')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_pendaftars');
    }
};
