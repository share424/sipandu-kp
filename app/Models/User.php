<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap', 
        'email', 
        'password',
        'hp',
        'no_identitas',
        'alamat',
        'sso_id',
        'unit',
        'nip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        return $this->hasRole(Role::SUPER_ADMIN);
    }

    public function isUPTD()
    {
        return $this->hasRole(Role::UPTD);
    }

    public function isAdminBidang()
    {
        return $this->hasRole(Role::ADMIN_BIDANG);
    }

    public function isKepalaDinas()
    {
        return $this->hasRole(Role::KEPALA_DINAS);
    }

    public function isUser()
    {
        return $this->hasRole(Role::USER);
    }

    public function role()
    {
        return $this->getRoleNames()[0];
    }

    public function perusahaan()
    {
        return $this->belongsToMany(Perusahaan::class, 'user_perusahaan', 'id_user', 'id_perusahaan');
    }

    public function hasPerusahaan()
    {
        $perusahaan = $this->perusahaan->first();
        return $perusahaan ? true : false;
    }

    public function kapal()
    {
        return $this->belongsToMany(Kapal::class, 'user_kapal', 'id_user', 'id_kapal');
    }
}
