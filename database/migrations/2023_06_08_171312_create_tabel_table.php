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
        Schema::create('tabel', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_linguistik');
            $table->float('A');
            $table->float('B');
            $table->float('C');
            $table->float('D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel');
    }
};
