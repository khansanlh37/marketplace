<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Variant;

class VariantSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            Variant::create([
                'product_id' => $product->id,
                'color' => 'Hitam',
                'type' => 'Standard',
                'price' => $product->price
            ]);

            Variant::create([
                'product_id' => $product->id,
                'color' => 'Putih',
                'type' => 'Premium',
                'price' => $product->price + 5000000
            ]);
        }
    }
}
