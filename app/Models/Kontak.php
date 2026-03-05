<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
    'email_1',
    'email_2', // Opsional
    'wa_1',
    'wa_2',    // Opsional
    'alamat',
    'link_google_maps', // Link URL (https://maps.google.com/...)
];

}
