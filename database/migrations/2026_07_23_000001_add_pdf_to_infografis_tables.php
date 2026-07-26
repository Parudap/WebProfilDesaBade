<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('infografis_stunting', function (Blueprint $table) {
            $table->string('judul')->after('id')->nullable();
            $table->string('file_pdf')->after('tahun')->nullable();
            $table->boolean('is_active')->default(true)->after('keterangan');
            $table->unsignedInteger('jumlah_balita')->nullable()->change();
            $table->unsignedInteger('jumlah_stunting')->nullable()->change();
            $table->decimal('prevalensi', 5, 2)->nullable()->change();
        });

        Schema::table('infografis_bansos', function (Blueprint $table) {
            $table->string('judul')->after('id')->nullable();
            $table->string('file_pdf')->after('tahun')->nullable();
            $table->boolean('is_active')->default(true)->after('keterangan');
            $table->string('nama_program')->nullable()->change();
        });

        Schema::table('infografis_idm', function (Blueprint $table) {
            $table->string('judul')->after('id')->nullable();
            $table->string('file_pdf')->after('tahun')->nullable();
            $table->text('keterangan')->after('file_pdf')->nullable();
            $table->boolean('is_active')->default(true)->after('keterangan');
            $table->decimal('skor_ikl', 5, 4)->nullable()->change();
            $table->decimal('skor_iks', 5, 4)->nullable()->change();
            $table->decimal('skor_ike', 5, 4)->nullable()->change();
            $table->decimal('skor_idm', 5, 4)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('infografis_stunting', function (Blueprint $table) {
            $table->dropColumn(['judul', 'file_pdf', 'is_active']);
        });

        Schema::table('infografis_bansos', function (Blueprint $table) {
            $table->dropColumn(['judul', 'file_pdf', 'is_active']);
        });

        Schema::table('infografis_idm', function (Blueprint $table) {
            $table->dropColumn(['judul', 'file_pdf', 'keterangan', 'is_active']);
        });
    }
};
