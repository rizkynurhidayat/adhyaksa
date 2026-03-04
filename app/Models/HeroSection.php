<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'tagline_light',
        'tagline_gold',
        'deskripsi',
        'teks_tombol',
        'bg_image',
        'lawyer_image',
    ];
}