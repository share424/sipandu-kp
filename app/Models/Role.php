<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole {

    const SUPER_ADMIN = 'Super Admin';
    const UPTD = 'UPTD';
    const ADMIN_BIDANG = 'Admin Bidang';
    const KEPALA_DINAS = 'Kepala Dinas';
    const USER = 'User';

    public static function availableRoles()
    {
        return [
            self::SUPER_ADMIN,
            self::UPTD,
            self::ADMIN_BIDANG,
            self::KEPALA_DINAS,
            self::USER,
        ];
    }

}