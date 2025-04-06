<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Branch;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $regions = [
            'Jabodetabek',
            'Jawa Barat',
            'Jawa Timur',
            'Bali',
            'Sulawesi Selatan',
            'Sulawesi Utara'
        ];

        $categories = [
            'Electric Vehicle',
            'Crossover',
            'SUV',
            'MPV'
        ];

        foreach ($regions as $region) {
            $branches = Branch::where('region', $region)->get();

            foreach ($branches as $branch) {
                foreach ($categories as $category) {
                    Category::create([
                        'name' => $category,
                        'branch_id' => $branch->id
                    ]);
                }
            }
        }
    }
}
