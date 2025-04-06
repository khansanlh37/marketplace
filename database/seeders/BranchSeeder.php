<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run()
    {
        Branch::insert([
            ['name' => 'Cabang Jakarta', 'location' => 'Jakarta Pusat', 'region' => 'Jabodetabek'],
            ['name' => 'Cabang Bandung', 'location' => 'Bandung', 'region' => 'Jawa Barat'],
            ['name' => 'Cabang Surabaya', 'location' => 'Surabaya', 'region' => 'Jawa Timur'],
            ['name' => 'Cabang Bali', 'location' => 'Denpasar', 'region' => 'Bali'],
            ['name' => 'Cabang Makassar', 'location' => 'Makassar', 'region' => 'Sulawesi Selatan'],
        ]);
    }
}