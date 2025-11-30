<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [
            ['name' => 'view posts', 'description' => 'View all posts'],
            ['name' => 'create posts', 'description' => 'Create a new post'],
            ['name' => 'edit posts', 'description' => 'Edit any post'],
            ['name' => 'delete posts', 'description' => 'Delete any post'],
            ['name' => 'manage users', 'description' => 'Manage application users'],
            ['name' => 'manage roles', 'description' => 'Manage roles and assignments'],
            ['name' => 'manage permissions', 'description' => 'Manage access permissions'],
            ['name' => 'manage categories', 'description' => 'Manage post categories'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission['name']], [
                'description' => $permission['description']
            ]);
        }
        echo "🎉 Permissions created!\n";
    }
}
