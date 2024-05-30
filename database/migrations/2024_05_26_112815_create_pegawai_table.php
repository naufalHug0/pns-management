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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('password');
            $table->string('nip',11)->unique();
            $table->string('npwp',25)->unique();
            $table->string('no_hp');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->enum('role',['pegawai','petugas','admin']);
            $table->string('foto_profil')->nullable();
            $table->foreignId('agama_id');
            $table->foreignId('golongan_id');
            $table->foreignId('jabatan_id');
            $table->timestamps();

            $table->foreign('agama_id')->references('id')->on('agama')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
