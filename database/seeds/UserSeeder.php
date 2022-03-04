<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_lengkap' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('superadmin2022'),
            'hp' => '0812341234',
            'no_identitas' => '123456789',
            'alamat' => 'Jl. Jalan'
        ])->assignRole(Role::SUPER_ADMIN);
    }
}
