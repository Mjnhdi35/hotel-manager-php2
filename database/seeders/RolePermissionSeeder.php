<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage countries',
            'manage cities',
            'manage hotels',
            'manage hotel bookings',
            'checkout hotels',
            'view hotel bookings'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm
            ]);
        }

        $customerRole = Role::firstOrCreate([
            'name' => 'customer'
        ]);

        $customerPermissions = [
            'checkout hotels',
            'view hotel bookings'
        ];

        $customerRole->syncPermissions($customerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'avatar' => 'images/iconadmin.png',
            'phone' => '1900100856',
            'password' => bcrypt('123321mdj')
        ]);

        $user->assignRole($superAdminRole);
    }
}
