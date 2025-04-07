<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123'),
            'role' => 'admin'
        ]);

        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'Test User1',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test@123'),
            'role' => 'user'
        ]);
        $user->assignRole($userRole);
    }
}
