<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AddExtraPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of permissions to be created
        $permissions = [
            'promo code' => [
                'promo code menu',
                'promo code create',
                'promo code edit',
                'promo code status',
                'promo code delete',
            ],
        ];

        $role = Role::where('name', 'Super Admin')->first();

        // Loop through the permissions array and create each permission
        foreach ($permissions as $group => $groupPermissions) {
            foreach ($groupPermissions as $permission) {
                $permission = Permission::create(['name' => $permission, 'group_name' => $group]);
                $role?->givePermissionTo($permission);
            }
        }

    }
}
