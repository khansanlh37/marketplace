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

    public function show($id): View
    {
        $product = Product::with([
            'variants' => function ($query): void {
                $query->orderBy('color');
            },
            'variants.productType'
        ])->findOrFail($id);
    
        // Filter varian yang punya tipe yang valid
        $variants = $product->variants
            ->filter(function ($variant): bool {
                return !empty($variant->type) && strtoupper($variant->type) !== 'N/A';
            })
            ->unique('type')
            ->values();
    
        // Ambil tipe produk dari relasi
        $productTypes = $product->variants
            ->pluck('productType')
            ->filter() // hapus null
            ->unique('id')
            ->values();
    
        // Ubah path gambar agar bisa diakses
        foreach ($product->variants as $variant) {
            if (!empty($variant->image)) {
                $variant->image = asset('storage/' . $variant->image);
            }
        }
    
        return view('products.show', compact('product', 'variants', 'productTypes'));
    }
    

    public function getVariantsByType(Request $request)
    {
        $productId = $request->product_id;
        $selectedType = $request->type;

        $variants = Variant::where('product_id', $productId)
                            ->where('tipe', $selectedType)
                            ->get(['id', 'warna', 'gambar']);

        return response()->json($variants);
    }
}
