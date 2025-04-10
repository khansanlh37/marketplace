<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminVariantController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\FavoriteController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product-types', App\Http\Controllers\Admin\ProductTypeController::class);
});

// Route::post('/variants', [AdminVariantController::class, 'store'])->name('admin.variants.store');
Route::get('/admin/variants/product_id/{product_id}/id/{id}', [AdminVariantController::class, 'getVariantByType']);

Route::prefix('admin')->name('admin.')->group(function () {

    // Route untuk halaman form create variant (opsional, jika punya halaman create sendiri)
    Route::get('variants/create', [AdminVariantController::class, 'create'])->name('variants.create');

    // Route untuk menampilkan daftar variants
    Route::get('variants', [AdminVariantController::class, 'index'])->name('variants.index');

    // Route untuk menyimpan variant baru
    Route::post('variants', [AdminVariantController::class, 'store'])->name('variants.store');

    // Route untuk edit variant
    Route::get('variants/{variant}/edit', [AdminVariantController::class, 'edit'])->name('variants.edit');
    Route::put('variants/{variant}', [AdminVariantController::class, 'update'])->name('variants.update');

    // Route untuk hapus variant
    Route::delete('variants/{variant}', [AdminVariantController::class, 'destroy'])->name('variants.destroy');
});


Route::get('/admin/branches', [BranchController::class, 'index'])->name('admin.branches.index');

Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');

Route::get('/product/variants', [ProductController::class, 'getVariantsByType']);

Route::post('/favorite/toggle/{id}', [FavoriteController::class, 'toggle'])->name('toggle.favorite');

// Route untuk halaman favorites
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

// Route untuk menambah/menghapus favorite
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('branches', BranchController::class);
});

Route::get('/admin/products/create', [ProductController::class, 'create'])
    ->name('admin.products.create');

Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('branches', App\Http\Controllers\Admin\BranchController::class);
    Route::resource('products', App\Http\Controllers\Admin\AdminProductController::class);
});
// Route untuk halaman marketplace (user biasa)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route untuk admin (dengan prefix dan middleware)
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Manajemen Produk di Admin
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Manajemen User di Admin
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

    // Logout Admin
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Route untuk menampilkan form login admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// Route untuk menangani proses autentikasi login
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Route untuk logout admin
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Redirect dari `/login` ke login admin (jika ada pemanggilan login dari middleware)
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Homepage atau Landing Page
Route::get('/', function () {
    return view('welcome');
});
