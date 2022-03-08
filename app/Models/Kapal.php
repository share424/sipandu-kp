<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
    protected $table = 'kapal';

    protected $fillable = [
        'merk_kapal',
        'ukuran_kapal',
        'lebar_kapal',
        'panjang_kapal',
        'dalam_kapal',
        'tahun_pembuatan',
        'tempat_pembuatan',
        'loa',
        'nomor_mesin',
        'merk_mesin',
        'tipe_mesin',
        'daya_mesin',
        'tempat_pendaftaran',
        'grosse_akta',
        'jumlah_palka',
        'tanda_pengenal_kapal',
        'gt',
        'nt',
        'nama_kapal',
        'nama_kapal_sebelum',
        'id_tipe_kapal',
        'id_bahan_kapal',
    ];

    public function tipe_kapal()
    {
        return $this->belongsTo(TipeKapal::class, 'id_tipe_kapal');
    }

    public function bahan_kapal()
    {
        return $this->belongsTo(BahanKapal::class, 'id_bahan_kapal');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_kapal', 'id_kapal', 'id_user');
    }
}
