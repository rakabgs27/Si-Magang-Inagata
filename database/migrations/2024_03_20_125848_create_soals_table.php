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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('divisi_id');
            $table->string('judul_soal');
            $table->string('deskripsi_soal')->nullable();
            $table->dateTime('tanggal_upload');
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
        Schema::dropIfExists('soals');
    }
};
