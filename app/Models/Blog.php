<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'gambar',
        'ringkasan',
        'konten',
        'tag_statistik',
        'is_published',
        'tanggal_publish',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'tanggal_publish' => 'datetime',
    ];
}
