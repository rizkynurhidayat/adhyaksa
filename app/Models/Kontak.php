<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
    'email_1_judul', // Judul untuk email_1
    'email_1_link',  // Link URL untuk email_1 (mailto:...)
    'wa_1_judul',
    'wa_1_link',
    'alamat',
    'link_google_maps', // Link URL (https://maps.google.com/...)
];

}
