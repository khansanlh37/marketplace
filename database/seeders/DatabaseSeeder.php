<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menjalankan seeder kategori dan produk
        $this->call([
            CategorySeeder::class, // Pastikan ini ada
            ProductSeeder::class,  // Tambahkan jika ada
            BranchSeeder::class, 
        ]);

        // Membuat Admin Marketplace
        User::create([
            'name' => 'Admin Marketplace',
            'email' => 'admin@example.com',
            'password' => Hash::make('Gowapassword32'), // Ganti dengan password yang aman
            'role' => 'admin', // Pastikan kolom ini ada di database
        ]);
    }
}