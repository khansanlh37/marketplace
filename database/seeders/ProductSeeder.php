<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Image;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Produk Toyota Avanza
        $product = Product::create([
            'name' => 'Toyota Avanza',
            'category_id' => 1,
            'price' => 250000000,
            'description' => 'Toyota Avanza, mobil keluarga yang nyaman dan ekonomis.'
        ]);

        // Menambahkan varian produk (Pastikan 'color' memiliki nilai)
        $variants = [
            [
                'type' => 'Avanza E MT',
                'color' => 'Putih', // Pastikan tidak NULL
                'price' => 250000000,
            ],
            [
                'type' => 'Avanza G AT',
                'color' => 'Hitam', // Tambahkan warna valid
                'price' => 270000000,
            ]
        ];

        // Simpan varian ke database
        foreach ($variants as $variant) {
            $product->variants()->create($variant);
        }

        // Menambahkan gambar produk
        $images = [
            ['path' => 'storage/images/avanza1.jpg'],
            ['path' => 'storage/images/avanza2.jpg'],
        ];

        // Simpan gambar ke database
        foreach ($images as $image) {
            $product->images()->create($image);
        }
    }
}
