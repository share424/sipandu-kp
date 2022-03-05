<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'nama_pemilik',
        'website',
        'alamat_perusahaan',
        'npwp'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_perusahaan', 'id_perusahaan', 'id_user');
    }
}
