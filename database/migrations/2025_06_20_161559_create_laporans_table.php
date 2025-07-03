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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_melapor');
            $table->string('lokasi_kerusakan');
            $table->text('deskripsi_kerusakan')->nullable();
            $table->string('lampiran')->nullable();
            $table->enum('status', ['ditolak', 'diterima', 'proses']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
