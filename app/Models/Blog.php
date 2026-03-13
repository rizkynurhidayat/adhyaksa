<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'gambar',
        'tag_statistik',
        'url_link',
        'tanggal_publish',
        'is_active'
    ];
}