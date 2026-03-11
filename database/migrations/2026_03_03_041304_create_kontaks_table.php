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
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('email_1_judul'); // Judul untuk email_1
            $table->string('email_1_link');  // Link URL untuk email_1
            $table->string('wa_1_judul')->nullable()    ; // Judul untuk wa_1
            $table->string('wa_1_link')->nullable();     // Link URL untuk wa_1
            $table->text('alamat');
            $table->text('link_google_maps'); // Link URL (https://maps.google.com
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
