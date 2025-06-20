<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@rentcar.test'],
            [
                'fullname' => 'Administrator',
                'password' => Hash::make('admin123'),
                'type' => 'admin',
                'photo' => 'default-admin.png',
            ]
        );

        Admin::updateOrCreate([
            'user_id' => $user->id,
        ], [
            'role' => 'superadmin', // contoh kalau kamu punya kolom role di tabel admins
        ]);
    }
}
