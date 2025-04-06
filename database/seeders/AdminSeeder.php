<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@marketplace.com',
            'password' => Hash::make('Gowapassword32'),
            'role' => 'admin'
        ]);
    }
}
