<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'first_name'              => 'Super',
            'last_name'              => 'Admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'role'              => 'admin',
            'password'          => Hash::make('12345678'),
        ]);
    }
}
