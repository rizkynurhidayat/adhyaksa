<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $fillable = [
        'nama',
        'logo',
        'website',
        'button_pengalaman',
        'button_sukses',
        'button_terlayani',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
