<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_desa', function (Blueprint $table) {
            $table->id();
            $table->longText('sejarah')->nullable();
            $table->text('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->string('luas_wilayah')->nullable();
            $table->string('jumlah_penduduk')->nullable();
            $table->string('jumlah_kk')->nullable();
            $table->string('koordinat')->nullable();
            $table->text('embed_map_url')->nullable();
            $table->text('map_link')->nullable();
            $table->string('batas_utara')->nullable();
            $table->string('batas_timur')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_barat')->nullable();
            $table->json('land_details')->nullable();
            $table->json('kas_desa')->nullable();
            $table->json('pengairan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_desa');
    }
};
