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
                        style="cursor: pointer; width: 45px;" {{-- lebar dikit agar tetap compact --}}
                        onclick="selectVariant('{{ $variant->type }}')"
                    >
                        <div
                            style="width: 36px; height: 36px; background-color: {{ $variant->color }}; border: 1px solid #ccc;"
                        ></div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Pilihan Tipe Produk -->
            <p class="mt-3"><strong>Warna yang dipilih</strong></p>
            <!-- <p id="selected-color" class="mb-2">Warna: -</p> -->
            <select name="variant" class="form-control" id="variantType">
                <option value="">Pilih Tipe</option>
                @foreach ($product->variants as $variant)
                    <option value="{{ $variant->type }}">{{ $variant->type }}</option>
                @endforeach
            </select>
            
            <!-- Tombol Simulasi Kredit -->
            <button class="btn btn-primary mt-3">Simulasi Kredit</button>
        </div>
    </div>
</div>

<script>
    // Fungsi saat klik variant box
    function selectVariant(type) {
        // Set dropdown ke tipe yang diklik
        const variantSelect = document.getElementById('variantType');
        variantSelect.value = type;

        // Panggil event change agar fetch berjalan
        variantSelect.dispatchEvent(new Event('change'));
    }

    // Event listener saat user ganti pilihan di dropdown
    document.getElementById('variantType').addEventListener('change', function() {
        const selectedType = this.value;
        const productId = {{ $product->id }};

        if (!selectedType) return;

        // Tampilkan gambar loading sementara
        document.getElementById("product-image").src = '/loading.gif';
        // document.getElementById("selected-color").innerText = 'Memuat warna...';

        fetch(`/admin/variants/product_id/${productId}/type/${selectedType}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    document.getElementById("product-image").src = data[0].gambar;
                    // document.getElementById("selected-color").innerText = 'Warna: ' + data[0].color;
                } else {
                    // document.getElementById("selected-color").innerText = 'Warna tidak ditemukan';
                }
            })
            .catch(error => {
                console.error("Error:", error);
                // document.getElementById("selected-color").innerText = 'Terjadi kesalahan';
            });
    });
</script>
@endsection
