<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_guru_siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi');
            $table->integer('id_guru');
            $table->integer('id_siswa');
            $table->integer('id_kriteria');
            $table->integer('nilai');
            // $table->foreign('id_guru')->references('id')->on('gurus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_guru_siswa');
    }
};
