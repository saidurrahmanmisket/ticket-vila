<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        User::create([
            'first_name'              => 'Custom',
            'last_name'              => 'User',
            'email'             => 'user@user.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('12345678'),
        ]);
    }
}
