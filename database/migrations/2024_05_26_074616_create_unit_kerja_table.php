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
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('tempat_tugas_id');
            $table->timestamps();

            $table->foreign('tempat_tugas_id')->references('id')->on('tempat_tugas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_kerja');
    }
};
