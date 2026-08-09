<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('email', 150)->nullable();
            $table->string('subjek', 200);
            $table->text('pesan');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pesans');
    }
};
