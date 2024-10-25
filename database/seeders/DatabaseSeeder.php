<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Membuat admin
        User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'phone_number' => '1234567890',
            'apartment_number' => '1A',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);
 
        // Anda juga bisa menambahkan pengguna biasa di sini
    }
}
