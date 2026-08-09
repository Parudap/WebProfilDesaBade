<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan_kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('catatan')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('layanan_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('layanan_kategori')->onDelete('cascade');
            $table->string('nama');
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('layanan_syarat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('layanan_item')->onDelete('cascade');
            $table->string('syarat');
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan_syarat');
        Schema::dropIfExists('layanan_item');
        Schema::dropIfExists('layanan_kategori');
    }
};
