<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('Admin@123'),
                'gender' => rand(0, 1),
                'remember_token' => Str::random(10),
                'is_admin' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('User@123'),
                'gender' => rand(0, 1),
                'remember_token' => Str::random(10),
                'is_admin' => false,
                'create_at' => now(),
            ],
        ]);
    }
}
