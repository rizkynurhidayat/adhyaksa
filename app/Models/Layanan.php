<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'ikon',
        'deskripsi_singkat',
        'apa_itu',
        'mengapa_butuh',
        'keuntungan_1',
        'keuntungan_2',
        'persentase_kasus',
        'is_active',
        'urutan',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
