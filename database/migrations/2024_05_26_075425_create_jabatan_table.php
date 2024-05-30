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
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('eselon_id');
            $table->foreignId('unit_kerja_id');
            $table->timestamps();

            $table->foreign('eselon_id')->references('id')->on('eselon')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerja')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan');
    }
};
