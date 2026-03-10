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
        Schema::table('kliens', function (Blueprint $table) {
            $table->dropColumn(['klien_terlayani', 'kasus_sukses', 'tahun_pengalaman']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kliens', function (Blueprint $table) {
            $table->string('klien_terlayani')->nullable();
            $table->string('kasus_sukses')->nullable();
            $table->string('tahun_pengalaman')->nullable();
        });
    }
};
