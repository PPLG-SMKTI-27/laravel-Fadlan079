<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Fadlan Firdaus',
            'email' => 'fadlanfirdaus220@gmail.com',
            'password' => Hash::make('password'),
            'whatsapp' => '+6282210732928',
            'instagram' => 'https://www.instagram.com/fdln007',
            'github' => 'https://github.com/Fadlan079',
            'linkedin' => 'https://www.linkedin.com/in/fadlan-firdaus-148344386',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
