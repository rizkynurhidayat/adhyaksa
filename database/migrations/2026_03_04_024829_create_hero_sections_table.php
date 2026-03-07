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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('tagline_light')->nullable();
            $table->string('tagline_gold')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('teks_tombol')->nullable();
            $table->string('bg_image')->nullable();            
            $table->string('lawyer_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
