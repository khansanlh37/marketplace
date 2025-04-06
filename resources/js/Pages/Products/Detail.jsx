import { usePage } from "@inertiajs/inertia-react";

export default function Detail() {
    const { product } = usePage().props;

    console.log("Produk diterima:", product); // Debugging di browser Console

    return (
        <div>
            <h1 className="text-xl font-bold">{product.name}</h1>
            <img src={product.images?.[0]?.image_url || "/default.jpg"} alt={product.name} className="w-1/2" />
            <p>Harga: Rp {product.price.toLocaleString()}</p>

            <h2 className="mt-4 text-lg font-semibold">Varian Produk:</h2>
            <ul>
                {product.variants?.map((variant) => (
                    <li key={variant.id} className="p-2 border">
                        {variant.variant_name} - Rp {variant.price.toLocaleString()}
                    </li>
                ))}
            </ul>
        </div>
    );
}
