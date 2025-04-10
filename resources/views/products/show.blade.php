@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img id="product-image" src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h5>{{ $product->name }}</h5>
            <p>{{ $product->category->name }}</p>
            <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            
            <!-- Menampilkan Variants -->
            <div>
                <h5>Variants</h5>
                <div class="d-flex flex-wrap align-items-center" style="gap: 6px;">
                    @foreach ($product->variants as $variant)
                    <div
                        class="variant-box rounded text-center"
                        style="cursor: pointer; width: 45px; {{ $variant->product_type_id != $defaultTypeId ? 'display:none;' : '' }}"
                        onclick="selectVariant('{{ $variant->id }}')"
                        data-type-id="{{ $variant->product_type_id }}"
                    >
                        <div
                            style="width: 36px; height: 36px; background-color: {{ $variant->color }}; border: 1px solid #ccc;">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Pilihan Tipe Produk -->
            <p class="mt-3"><strong>Warna yang dipilih</strong></p>
            <!-- <p id="selected-color" class="mb-2">Warna: -</p> -->
            <select name="variant" class="form-control" id="variantType">
                <option value="">Pilih Tipe</option>
                @foreach ($productTypes as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $defaultTypeId ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            <!-- Tombol Simulasi Kredit -->
            <button class="btn btn-primary mt-3">Simulasi Kredit</button>
        </div>
    </div>
</div>

<script>
    const variantElements = document.querySelectorAll('.variant-box');
    const variantSelect = document.getElementById('variantType');
    const productId = {{ $product->id }};

    // Event saat memilih tipe produk dari dropdown
    variantSelect.addEventListener('change', function () {
        const selectedType = this.value;

        if (!selectedType) return;

        // Tampilkan loading sementara
        document.getElementById("product-image").src = '/loading.gif';

        // Tampilkan hanya warna yg sesuai tipe
        variantElements.forEach(box => {
            const typeId = box.getAttribute('data-type-id');
            if (typeId === selectedType) {
                box.style.display = 'inline-block';
            } else {
                box.style.display = 'none';
            }
        });

        // Ambil variant pertama dari tipe tersebut untuk auto-load gambar
        fetch(`/admin/variants/product_id/${productId}/id/${selectedType}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    document.getElementById("product-image").src = data[0].gambar;
                } else {
                    document.getElementById("product-image").src = '/images/no-image.png';
                }
            })
            .catch(error => {
                console.error("Error fetch variant:", error);
                document.getElementById("product-image").src = '/images/error.png';
            });
    });

    // Fungsi saat klik kotak warna
    function selectVariant(id) {
        // Set ke dropdown
        const variantSelect = document.getElementById('variantType');
        variantSelect.value = id;

        // Panggil ulang event change
        variantSelect.dispatchEvent(new Event('change'));
    }

    // Trigger awal untuk tipe default (kalau ada)
    window.addEventListener('DOMContentLoaded', () => {
        const variantSelect = document.getElementById('variantType');
        if (variantSelect && variantSelect.value) {
            variantSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection
