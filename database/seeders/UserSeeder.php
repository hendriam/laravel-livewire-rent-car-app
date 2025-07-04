<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Super Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'), // ganti dengan password aman!
            'phone' => '081234567890',
            'address' => '-',
            'type' => 'admin',
            'role' => 'superadmin',
        ]);
    }
}
