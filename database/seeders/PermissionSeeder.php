<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of permissions to be created
        $permissions = [
            'dashboard' => [
                'live statics',
                'revenue details',
                'users details',
                'sales analytics',
                'Sold Today',
                'Site Visit',
                'affiliates details',
                'top country visits',
                'top affiliates user',
            ],
            'tickets' => [
                'tickets menu',
                'tickets download',
            ],
        ];

        // Loop through the permissions array and create each permission
        foreach ($permissions as $group => $groupPermissions) {
            foreach ($groupPermissions as $permission) {
                Permission::create(['name' => $permission, 'group_name' => $group]);
            }
        }
    }
}
