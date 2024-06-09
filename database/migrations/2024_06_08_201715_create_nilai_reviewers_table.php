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
        Schema::create('nilai_reviewers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_wawancara_pendaftars_id');
            $table->unsignedBigInteger('nilai_pendaftars_id');
            $table->date('tanggal_verifikasi')->nullable();
            $table->enum('status', ['Belum Diverifikasi', 'Terverifikasi', 'Tertolak'])->default('Belum Diverifikasi');
            $table->foreign('nilai_wawancara_pendaftars_id')->references('id')->on('nilai_wawancara_pendaftars')->restrictOnDelete();
            $table->foreign('nilai_pendaftars_id')->references('id')->on('nilai_pendaftars')->restrictOnDelete();
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
        Schema::dropIfExists('nilai_reviewers');
    }
};
