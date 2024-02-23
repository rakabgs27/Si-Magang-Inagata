<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Manager",
            'email' => "manager@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "User",
            'email' => "user@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
