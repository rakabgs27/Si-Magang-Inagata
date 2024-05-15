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
        Schema::create('test_soals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soal_pendaftar_id');
            $table->timestamps();
            $table->foreign('soal_pendaftar_id')->references('id')->on('soal_pendaftars')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_soals');
    }
};
