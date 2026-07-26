<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_belanja', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->default('Umum');
            $table->string('price')->default('Rp0');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('rating', 3, 1)->default(0);
            $table->unsignedInteger('rating_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_belanja');
    }
};
