<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPendiri extends Model
{
    protected $fillable = [
        'nama',
        'position',
        'foto',
        'deskripsi',
        'kasus_sukses',
        'tahun_pengalaman',
    ];
}
