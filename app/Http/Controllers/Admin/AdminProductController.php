<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Branch;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class AdminProductController extends Controller
{
    // Menampilkan daftar produk di halaman admin
    public function index()
    {
        // Ambil data kategori
        $categories = Category::all();
    
        // Ambil data produk dan kategori, jika perlu
        $products = Product::all();
    
        // Kirim data ke view
        return view('admin.products.index', compact('products', 'categories'));
    }

    // Menampilkan halaman tambah produk
    public function create()
    {
        $branches = Branch::all();
        $categories = Category::all(); // Jika ada kategori juga

        return view('admin.products.create', compact('branches', 'categories'));
    }

    // Menyimpan produk baru beserta variannya
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'color' => 'nullable|string', // Validasi untuk warna
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'branch_id' => 'required|exists:branches,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // Simpan gambar produk utama jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product_images', 'public');
        }
    
        // Simpan produk utama
        $product = Product::create($validated);
    
        return redirect()->route('admin.products')->with('success', 'Produk berhasil ditambahkan!');
    }           

    // Menampilkan halaman edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $branches = Branch::all();
    
        return view('admin.products.edit', compact('product', 'categories', 'branches'));
    }     

    // Mengupdate produk
    public function update(Request $request, Product $product): RedirectResponse
    {
        // Validasi input produk utama
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'branch_id' => 'required|exists:branches,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // **Update gambar produk utama jika ada perubahan**
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('product_images', 'public');
        }
    
        // **Update produk utama tanpa varian**
        $product->update($validated);
    
        // **Hapus varian lama jika tidak diperlukan lagi**
        // Tidak perlu lagi memproses varian di sini, karena sudah dipisahkan ke tabel terpisah
    
        // **Return Response yang benar**
        return redirect()->route('admin.products')->with('success', 'Produk berhasil diperbarui!');
    }
    
    
    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Produk berhasil dihapus');
    }

    public function manageVariants()
    {
        // Ambil data varian dari database
        $variants = Variant::all();  // Pastikan ada tabel 'variants' di database Anda

        // Kembalikan tampilan dengan data varian
        return view('admin.variants.index', compact('variants'));
    }
}
