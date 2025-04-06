<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Branch;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showLoginForm()
    {
        return view('admin.login'); // Sesuaikan dengan lokasi view Anda
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
    }
    
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
    

        return view('admin.dashboard', compact('totalUsers', 'totalProducts'));
    }

    public function products()
    {
        $products = Product::with('category')->get();
        return view('admin.products', compact('products'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Pastikan menggunakan guard yang benar jika ada multi-auth
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Logout berhasil');
    }
    public function create()
    {
        $categories = Category::all(); // Pastikan ini sudah ada
        $branches = Branch::all(); // Ambil semua cabang

        return view('admin.products.create', compact('categories', 'branches'));
    }
}
