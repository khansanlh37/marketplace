<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // Menampilkan daftar produk favorit
    public function index()
    {
        // Ambil data favorit dari session
        $favoriteIds = session('favorites', []);
    
        // Ambil produk favorit berdasarkan ID yang tersimpan
        $favorites = Product::whereIn('id', $favoriteIds)->get();
    
        return view('products.favorites', compact('favorites'));
    }
    
    // Fungsi untuk menambah/menghapus produk dari favorit
    public function toggle(Request $request, $id)
    {
        $favorites = session('favorites', []);
    
        if (in_array($id, $favorites)) {
            $favorites = array_diff($favorites, [$id]); // Hapus dari favorit
            session(['favorites' => $favorites]);
            return response()->json(['message' => 'Removed from favorites', 'favorites' => $favorites]);
        } else {
            $favorites[] = $id; // Tambahkan ke favorit
            session(['favorites' => $favorites]);
            return response()->json(['message' => 'Added to favorites', 'favorites' => $favorites]);
        }
    }      
}
