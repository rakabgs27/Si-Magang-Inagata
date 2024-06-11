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
        Schema::create('nilai_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftar_id');
            $table->enum('status',['Belum Dinilai','Sudah Dinilai'])->default('Belum Dinilai');
            for ($i = 1; $i <= 44; $i++) {
                $table->double('kriteria_' . $i)->nullable();
            }
            $table->foreign('pendaftar_id')->references('id')->on('pendaftars')->onDelete('cascade');
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
        Schema::dropIfExists('nilai_pendaftars');
    }
};
