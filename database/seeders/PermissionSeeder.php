<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage_users',
            'manage_roles',
            'manage_branches',
            'manage_permissions',
            'view_orders',
            'create_orders',
            'edit_orders',
            'delete_orders',
            'view_shipments',
            'create_shipments',
            'edit_shipments',
            'view_inventory',
            'manage_inventory',
            'view_reports',
            'manage_settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
