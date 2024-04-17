<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 5 dummy user records
        $users = [];
        
        for ($i = 0; $i < 5; $i++) {
            $users[] = [
                'name' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => Hash::make('password123'), 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert data into the users table
        DB::table('users')->insert($users);
    }
}
