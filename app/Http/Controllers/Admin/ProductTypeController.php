<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        $types = ProductType::with('product')->get();
        return view('admin.product_types.index', compact('types'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.product_types.create', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $productType = ProductType::findOrFail($id);
        $productType->name = $request->name;
        $productType->save();

        return redirect()->route('admin.product-types.index')->with('success', 'Tipe produk berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'product_id' => 'required|exists:products,id', // Pastikan produk yang dipilih valid
            'name' => 'required|string',
        ]);
    
        // Simpan tipe produk dan kaitkan dengan produk yang dipilih
        $productType = new ProductType;
        $productType->name = $request->name;
        $productType->product_id = $request->product_id;  // Menyimpan product_id
        $productType->save();
    
        // Redirect atau beri pesan sukses
        return redirect()->route('admin.product-types.index')->with('success', 'Tipe produk berhasil ditambahkan');
    }    

    public function edit($id)
    {
        $productType = ProductType::findOrFail($id);
        return view('admin.product-types.edit', compact('productType'));
    }

    public function destroy($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->delete();

        return redirect()->route('admin.product-types.index')->with('success', 'Tipe produk berhasil dihapus!');
    }
}
