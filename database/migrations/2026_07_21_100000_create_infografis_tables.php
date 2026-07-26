<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Stunting data
        Schema::create('infografis_stunting', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->unsignedInteger('jumlah_balita')->default(0);
            $table->unsignedInteger('jumlah_stunting')->default(0);
            $table->decimal('prevalensi', 5, 2)->default(0); // persen
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        // Bansos data
        Schema::create('infografis_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');        // PKH, BPNT, BLT, dll
            $table->year('tahun');
            $table->unsignedInteger('jumlah_penerima')->default(0);
            $table->string('anggaran')->nullable(); // misal "Rp 150.000.000"
            $table->text('keterangan')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        // IDM (Indeks Desa Membangun)
        Schema::create('infografis_idm', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->decimal('skor_ikl', 5, 4)->default(0);  // Ketahanan Lingkungan
            $table->decimal('skor_iks', 5, 4)->default(0);  // Ketahanan Sosial
            $table->decimal('skor_ike', 5, 4)->default(0);  // Ketahanan Ekonomi
            $table->decimal('skor_idm', 5, 4)->default(0);  // Total IDM
            $table->string('status_idm')->nullable();        // Maju, Berkembang, dll
            $table->timestamps();
        });

        // SDGs per goal
        Schema::create('infografis_sdgs', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->unsignedTinyInteger('goal_nomor');       // 1-18
            $table->string('goal_nama');
            $table->decimal('capaian', 5, 2)->default(0);   // persen
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infografis_stunting');
        Schema::dropIfExists('infografis_bansos');
        Schema::dropIfExists('infografis_idm');
        Schema::dropIfExists('infografis_sdgs');
    }
};