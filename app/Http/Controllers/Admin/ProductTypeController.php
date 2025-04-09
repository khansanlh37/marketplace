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

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'name' => 'required|string|max:255',
        ]);

        ProductType::create($request->all());
        return redirect()->route('admin.product-types.index')->with('success', 'Type created');
    }
}
