<?php

namespace App\Http\Controllers\Admin;

use App\Models\Variant;
use App\Models\Category;
use App\Models\Product;
use App\Models\Branch;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminVariantController extends Controller
{
    public function index()
    {   
        // Ambil produk terbaru
        $product = Product::latest()->first();

        // Simpan ke session
        session(['product_id' => $product->id]);

        // Ambil semua relasi yang diperlukan
        $variants = Variant::with(['productType', 'category', 'branch'])->get();
        $products = Product::all();
        $categories = Category::all();
        $branches = Branch::all();

        // Ambil hanya tipe produk yang belum dipakai oleh produk ini
        $productTypes = ProductType::whereNotIn('id', function ($query) use ($product) {
            $query->select('product_type_id')
                ->from('variants')
                ->where('product_id', $product->id);
        })->get();
        
        return view('admin.variants.index', compact('variants', 'categories', 'branches', 'products', 'productTypes'));
        
    }

    // Menampilkan halaman tambah varian
    public function create()
    {
        $categories = Category::all();
        $branches = Branch::all();
        $productTypes = ProductType::all();

        return view('admin.variants.create', compact('categories', 'branches', 'productTypes'));
    }

    // Menyimpan varian yang baru ditambahkan
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'product_type_id' => 'required|exists:product_types,id',
                'color' => 'required|string',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5120',
                'category_id' => 'required|exists:categories,id',
                'branch_id' => 'required|exists:branches,id',
                'product_id' => 'required|exists:products,id',
            ]);

            $variant = new Variant($validated);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('variant_images', 'public');
                $variant->image = $path;
            }

            $variant->save();

            return redirect()->route('admin.variants.index')->with('success', 'Variant berhasil disimpan');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan varian: ' . $e->getMessage());
        }
    }

    public function getVariantByType($product_id, $id)
    {
        $variants = Variant::where('product_id', $product_id)
                            ->where('id', $id)
                            ->get();

        $variants->transform(function ($variant) {
            $variant->gambar = asset('storage/' . $variant->image);
        // untuk field 'gambar' di fetch
            return $variant;
        });

        return response()->json($variants);
    }

    // Menampilkan halaman edit varian
    public function edit($id)
    {
        // Mengambil varian berdasarkan ID
        $variant = Variant::findOrFail($id);
        $products = Product::all();
        $branches = Branch::all();
        $categories = Category::all();

        // Menampilkan form edit dengan data varian
        return view('admin.variants.edit', compact('variant', 'products', 'branches', 'categories'));
    }

    // Memperbarui data varian yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'branch_id' => 'required|exists:branches,id',
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($request->old_image) {
                Storage::disk('public')->delete($request->old_image);
            }
            $validated['image'] = $request->file('image')->store('variant_images', 'public');
        }

        // Mencari varian berdasarkan ID dan memperbarui data
        $variant = Variant::findOrFail($id);
        $variant->update($validated);

        // Kembali ke halaman varian dengan pesan sukses
        return redirect()->route('admin.variants.index')->with('success', 'Varian berhasil diperbarui');
    }

    // Menghapus varian
    public function destroy($id)
    {
        // Mencari varian berdasarkan ID dan menghapusnya
        $variant = Variant::findOrFail($id);

        // Menghapus gambar jika ada
        if ($variant->image) {
            Storage::disk('public')->delete($variant->image);
        }

        // Hapus varian
        $variant->delete();

        // Kembali ke halaman varian dengan pesan sukses
        return redirect()->route('admin.variants.index')->with('success', 'Varian berhasil dihapus');
    }
}
