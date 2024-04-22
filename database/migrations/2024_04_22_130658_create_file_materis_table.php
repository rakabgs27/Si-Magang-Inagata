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
        Schema::create('file_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('soal_id');
            $table->string('files');
            $table->timestamps();
            $table->foreign('soal_id')->references('id')->on('soals')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_materis');
    }
};
