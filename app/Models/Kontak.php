<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'jenis',
        'judul_tampilan',
        'url_tautan',
    ];
}
