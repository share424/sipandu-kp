<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeKapal extends Model
{
    protected $table = 'tipe_kapal';

    protected $fillable = [
        'nama_tipe',
    ];

}
