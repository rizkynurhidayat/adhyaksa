<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    protected $fillable = [
        'klien_terlayani',
        'kasus_sukses',
        'tahun_pengalaman',
    ];
}
