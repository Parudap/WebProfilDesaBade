<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->year('tahun');
            $table->string('file_pdf');
            $table->text('keterangan')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apbdes');
    }
};
