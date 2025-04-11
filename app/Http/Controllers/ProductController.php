<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Branch;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query();

        // Ambil input pencarian dari request
        $search = $request->input('search');

        // Filter berdasarkan pencarian
        if (!empty($search)) {
            $query->where('name', 'LIKE', "%$search%");
        }

        // Filter tambahan (region, branch, category)
        if ($request->filled('region')) {
            $query->whereHas('branch', function (Builder $q) use ($request) {
                $q->where('region', $request->region);
            });
        }

        if ($request->filled('branch')) {
            $query->where('branch_id', $request->branch);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Gunakan pagination untuk membatasi jumlah produk per halaman
        $products = $query->paginate(12);

        // Ambil daftar filter untuk dropdown
        $regions = Branch::distinct()->pluck('region');
        $branches = Branch::all();
        $categories = Category::all();

        // Kirim kembali nilai search ke view agar tetap ada di input field
        return view('products.index', compact('products', 'regions', 'branches', 'categories', 'search'));
    }
    public function show($id)
    {
        $product = Product::with(['variants', 'productType'])->findOrFail($id);
    
        // Pastikan ada data produk dan variannya
        if (!$product || $product->variants->isEmpty()) {
            abort(404, 'Product not found or has no variants');
        }
    
        // Ambil data tipe produk dari relasi variants
        $productTypes = $product->variants->pluck('productType')->unique('id');
    
        // Pastikan productTypes tidak kosong
        if ($productTypes->isEmpty()) {
            $productTypes = collect(); // Set ke koleksi kosong jika tidak ada
        }
    
        $defaultTypeId = $product->variants->first()->product_type_id ?? null;
    
        // Ambil gambar untuk setiap varian agar bisa diakses
        foreach ($product->variants as $variant) {
            if (!empty($variant->image)) {
                $variant->image = asset('storage/' . $variant->image);
            }
        }
    
        return view('products.show', [
            'product' => $product,
            'variants' => $product->variants,
            'productTypes' => $productTypes,
            'defaultTypeId' => $defaultTypeId,
        ]);
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
}
