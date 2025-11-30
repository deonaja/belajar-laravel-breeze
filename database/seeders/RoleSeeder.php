<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $writer = Role::firstOrCreate(['name' => 'writer']);
        $viewer = Role::firstOrCreate(['name' => 'viewer']);

        $permissions = Permission::all();
        
        // Assign all permissions to admin
        $admin->syncPermissions($permissions);

        // Writer: hanya untuk post CRUD kecuali delete
        $writer->syncPermissions([
            'view posts',
            'create posts',
            'edit posts',
        ]);

        // Viewer: hanya bisa view posts
        $viewer->syncPermissions([
            'view posts',
        ]);

        echo "🔥 Role permissions assigned!\n";
    }
}
