<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari atau buat role admin
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Cari atau buat user admin default
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // kondisi pengecekannya
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'), // Default password
                'email_verified_at' => now(), // 🔥 langsung dianggap verified
            ]
        );

        // Assign role admin ke user ini
        if (!$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }

        echo "👑 Admin created: admin@example.com | password123\n";
    }
}
