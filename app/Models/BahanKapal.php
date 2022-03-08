<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanKapal extends Model
{
    protected $table = 'bahan_kapal';

    protected $fillable = [
        'nama_bahan',
        'kode',
    ];

}
