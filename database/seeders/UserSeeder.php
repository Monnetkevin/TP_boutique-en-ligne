<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'last_name' => 'Monnet',
            'first_name' => 'kevin',
            'email' => 'monnet.kevin@hotmail.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('azertyuiop'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'postal_code' => '72000',
            'city' => 'le mans',
            'address' => '17 avenue de paderborn',
            'country' => 'france',
            'phone' => '0606060606'
        ]);

        // User
        User::create([
            'last_name' => 'martin',
            'first_name' => 'bernard',
            'email' => 'martin.bernard@user.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('azertyuiop'),
            'remember_token' => Str::random(10),
            'role' => 'user',
            'postal_code' => '72540',
            'city' => 'joué en charnie',
            'address' => 'lune de joué en charnie',
            'country' => 'france',
            'phone' => '0606060606'
        ]);
    }
}
