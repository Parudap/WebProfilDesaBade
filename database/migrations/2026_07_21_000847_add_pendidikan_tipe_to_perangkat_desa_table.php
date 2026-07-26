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
        Schema::table('perangkat_desa', function (Blueprint $table) {
            $table->string('pendidikan')->nullable()->after('jabatan');
            $table->enum('tipe', ['perangkat', 'bpd'])->default('perangkat')->after('pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perangkat_desa', function (Blueprint $table) {
            $table->dropColumn(['pendidikan', 'tipe']);
        });
    }
};
