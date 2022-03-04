<?php 

namespace App\Services;

use App\Models\Role;

class MenuService
{
    public static function getMenu()
    {
        $menus = [
            [
                'url' => route('home'),
                'text' => 'Dashboard Admin',
                'icon' => 'icon-speedometer',
                'roles' => Role::availableRoles() // all roles
            ],
            [
                'url' => url(''),
                'text' => 'Data Master',
                'icon' => 'icon-note',
                'roles' => [Role::SUPER_ADMIN, Role::UPTD, Role::ADMIN_BIDANG],
                'submenus' => [
                    [
                        'text' => 'Master User',
                        'url' => route('users.index'),
                    ],
                    [
                        'text' => 'Master Alat Tangkap',
                        'url' => url('alattangkap'),
                        
                    ],
                    [
                        'text' => 'Master Tipe Kapal',
                        'url' => url('tipekapal'),
                        
                    ],
                    [
                        'text' => 'Master Bahan Kapal',
                        'url' => url('bahankapal'),
                        
                    ],
                    [
                        'text' => 'Master Kapal',
                        'url' => url('kapal'),
                        
                    ],
                    [
                        'text' => 'Master Perusahaan',
                        'url' => url('perusahaan')
                    ]
                ],
            ],
            [
                'url' => route('pelayanan.index'),
                'text' => 'Info Pelayanan',
                'icon' => 'icon-note',
                'roles' => Role::availableRoles()
            ],
        ];
        return $menus;
    }
}
