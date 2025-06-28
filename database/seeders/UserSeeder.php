<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Andy',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Ali',
            'email' => 'ali@example.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Alfin',
            'email' => 'alfin@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
