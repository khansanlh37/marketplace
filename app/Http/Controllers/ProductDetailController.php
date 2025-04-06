<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ProductDetailController extends Controller
{
    // Menampilkan halaman tambah varian & gambar
    public function create($productId)
    {
        $product = Product::with(['variants', 'images'])->findOrFail($productId);
        return view('admin.products.details.create', compact('product'));
    }

    // Menyimpan varian produk
    public function store(Request $request, $productId)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Variant::create([
            'product_id' => $productId,
            'type' => $request->type,
            'color' => $request->color,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.products.details.create', $productId)
                         ->with('success', 'Varian berhasil ditambahkan');
    }

    // Menghapus varian produk
    public function destroy($id)
    {
        $variant = Variant::findOrFail($id);
        $productId = $variant->product_id;
        $variant->delete();

        return redirect()->route('admin.products.details.create', $productId)
                         ->with('success', 'Varian berhasil dihapus');
    }

    // Menyimpan gambar produk
    public function storeImage(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('products', 'public');

        Image::create([
            'product_id' => $productId,
            'path' => $path,
        ]);

        return redirect()->route('admin.products.details.create', $productId)
                         ->with('success', 'Gambar berhasil ditambahkan');
    }

    // Menghapus gambar produk
    public function destroyImage($id)
    {
        $image = Image::findOrFail($id);
        $productId = $image->product_id;

        // Hapus file gambar dari storage
        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('admin.products.details.create', $productId)
                         ->with('success', 'Gambar berhasil dihapus');
    }
}
