<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
                'dashboard live statics',
                'dashboard revenue details',
                'dashboard users details',
                'dashboard sales analytics',
                'dashboard sold today',
                'dashboard site visit',
                'dashboard affiliates details',
                'dashboard top country visits',
                'dashboard top affiliates user',
            ],
            'role' => [
                'role menu',
                'role create',
                'role edit',
                'role delete',
                'role user menu',
                'admin user menu',
                'admin user create',
                'admin user edit',
            ],
            'tickets' => [
                'tickets menu',
                'tickets download',
            ],
            'invoice' => [
                'invoice menu',
                'invoice download',
                'invoice refund',
            ],
            'campaign' => [
                'campaign menu',
                'campaign create',
                'campaign edit',
                'campaign delete',
                'campaign status',
            ],
            'gift' => [
                'gift menu',
                'gift create',
                'gift edit',
                'gift delete',
                'gift status',
            ],
            'gift key feature' => [
                'gift key feature menu',
                'gift key feature create',
                'gift key feature edit',
                'gift key feature delete',
                'gift key feature status',
            ],
            'user' => [
                'user menu',
                'user view',
            ],
            'statistics' => [
                'statistics live statics',
                'statistics revenue details',
                'statistics users details',
                'statistics sales analytics',
                'statistics Sold Today',
                'statistics average details',
                'statistics top country visits',
                'statistics top country income',
                'statistics top affiliates user',
                'statistics total affiliates sales',
            ],
            'team' => [
                'team menu',
                'team create',
                'team edit',
                'team delete',
                'team status',
            ],
            'cms' => [
                'cms menu',
                'cms create',
                'cms edit',
                'cms delete',
                'cms status',
            ],
            'faq' => [
                'faq menu',
                'faq create',
                'faq edit',
                'faq delete',
                'faq status',
            ],
            'dynamic page' => [
                'dynamic page menu',
                'dynamic page create',
                'dynamic page edit',
                'dynamic page delete',
                'dynamic page status',
            ],
            'house file' => [
                'house file menu',
                'house file create',
                'house file edit',
                'house file delete',
                'house file status',
            ],
            'news' => [
                'news menu',
                'news create',
                'news edit',
                'news delete',
                'news status',
            ],
            'help center' => [
                'help center menu',
                'help center replay',
                'help center status',
            ],
            'settings' => [
                'system settings',
                'social media settings',
                'configuration settings',
            ],

            'notifications' => [
                'notification menu',
                'notification all read',
                'notification delete',
            ],
        ];

        // Loop through the permissions array and create each permission
        foreach ($permissions as $group => $groupPermissions) {
            foreach ($groupPermissions as $permission) {
                Permission::create(['name' => $permission, 'group_name' => $group]);
            }
        }

        //give all permission to admin
        $permissions = Permission::pluck('name')->toArray();
        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo($permissions);
        $admin = User::where('email', 'admin@admin.com')->first();
        $admin?->assignRole($role);
    }
}
