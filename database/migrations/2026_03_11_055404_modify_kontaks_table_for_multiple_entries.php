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
        Schema::table('kontaks', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn([
                'email_1_judul',
                'email_1_link',
                'wa_1_judul',
                'wa_1_link',
                'alamat',
                'link_google_maps'
            ]);

            // Add new columns for multiple entries
            $table->string('jenis'); // 'email', 'whatsapp', 'lokasi', 'iframe_peta'
            $table->string('judul_tampilan');
            $table->text('url_tautan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kontaks', function (Blueprint $table) {
            // Re-add old columns
            $table->string('email_1_judul')->nullable();
            $table->string('email_1_link')->nullable();
            $table->string('wa_1_judul')->nullable();
            $table->string('wa_1_link')->nullable();
            $table->text('alamat')->nullable();
            $table->text('link_google_maps')->nullable();

            // Drop new columns
            $table->dropColumn(['jenis', 'judul_tampilan', 'url_tautan']);
        });
    }
};
