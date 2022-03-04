<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Role::availableRoles() as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}
