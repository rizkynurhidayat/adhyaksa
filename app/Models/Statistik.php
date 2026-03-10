<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'klien_terlayani',
        'kasus_sukses',
        'tahun_pengalaman',
    ];
}
