<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createdBy = User::where('email', 'admin@test.com')->first();

        Driver::create([
            'fullname' => 'Driver Test',
            'phone' => '082212345678',
            'address' => '-',
            'status' => 'available',
            'created_by' => $createdBy->id,
        ]);
    }
}
