<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil produk pertama
        $product = Product::first();

        // Pastikan produk ada sebelum menambahkan gambar
        if ($product) {
            Image::create([
                'product_id' => $product->id, // Ambil id produk yang ada
                'path' => 'images/products/kona-electric.jpg'
            ]);
        }
    }
}
