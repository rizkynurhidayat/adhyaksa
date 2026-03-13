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
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->string('tagline_light')->nullable()->change();
            $table->string('tagline_gold')->nullable()->change();
            $table->text('deskripsi')->nullable()->change();
            $table->string('teks_tombol')->nullable()->change();
            $table->string('bg_image')->nullable()->change();
            $table->string('lawyer_image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->string('tagline_light')->nullable(false)->change();
            $table->string('tagline_gold')->nullable(false)->change();
            $table->text('deskripsi')->nullable(false)->change();
            $table->string('teks_tombol')->nullable(false)->change();
            $table->string('bg_image')->nullable(false)->change();
            $table->string('lawyer_image')->nullable(false)->change();
        });
    }
};
