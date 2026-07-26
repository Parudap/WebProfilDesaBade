<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // usia, pendidikan, pekerjaan, agama, perkawinan, pemilih
            $table->string('label');
            $table->unsignedInteger('value_laki')->default(0);
            $table->unsignedInteger('value_perempuan')->default(0);
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('dusun', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->unsignedInteger('jiwa')->default(0);
            $table->unsignedInteger('kk')->default(0);
            $table->unsignedInteger('laki')->default(0);
            $table->unsignedInteger('perempuan')->default(0);
            $table->string('percentage')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });

        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduk');
        Schema::dropIfExists('dusun');
        Schema::dropIfExists('perangkat_desa');
    }
};
