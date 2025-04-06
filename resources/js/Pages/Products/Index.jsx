import React, { useState, useEffect } from "react";
import { usePage } from "@inertiajs/inertia-react";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-react";
import { route } from "ziggy-js";

export default function Index() {
    const { products, categories } = usePage().props;

    // Ambil kategori dari URL jika ada
    const params = new URLSearchParams(window.location.search);
    const initialCategory = params.get("category") || "all";

    // State untuk selectedCategory
    const [selectedCategory, setSelectedCategory] = useState(initialCategory);

    useEffect(() => {
        setSelectedCategory(initialCategory);
    }, [initialCategory]);

    // Fungsi saat kategori diubah
    const handleCategoryChange = (e) => {
        const selected = e.target.value;
        setSelectedCategory(selected);
        Inertia.get("/products", { category: selected !== "all" ? selected : null });
    };

    return (
        <div className="flex min-h-screen">
            {/* Sidebar Filter */}
            <div className="w-1/4 p-6 bg-gray-100 min-h-screen">
                <h2 className="text-lg font-bold mb-3">Filter Kategori</h2>
                <select
                    value={selectedCategory}
                    onChange={handleCategoryChange}
                    className="w-full p-2 border rounded-md"
                >
                    <option value="all">Semua Kategori</option>
                    {categories &&
                        categories.map((category) => (
                            <option key={category.id} value={category.id}>
                                {category.name}
                            </option>
                        ))}
                </select>
            </div>

            {/* Daftar Produk */}
            <div className="w-3/4 p-6">
                <h1 className="text-xl font-bold mb-6">Daftar Produk</h1>
                <div className="grid grid-cols-3 gap-6">
                  {products?.length > 0 ? (
                      products.map((product) => (
                        <div key={product.id} className="bg-white p-4 rounded-lg shadow">
                            <Link href={route('products.show', product.id)}>
                                <img src={product.images?.[0]?.image_url || "images/default-image.png"} className="w-full h-48 object-cover rounded" />
                                <h2 className="text-lg font-semibold">{product.name}</h2>
                                <p className="text-gray-600">Rp {product.price.toLocaleString()}</p>
                            </Link>
                        </div>
                      ))
                  ) : (
                      <p className="text-gray-500 col-span-full text-center">Tidak ada produk tersedia</p>
                  )}
                </div>
            </div>
        </div>
    );
}
