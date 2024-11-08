<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'email' => 'admin@admin.site',
            'name' => 'Admin',
            'email_verified_at' => now(),
            'password' => 'password',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
