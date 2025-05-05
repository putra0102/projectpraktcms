@extends('layouts.app')

@section('content')gc_collect_cycles

<style>
    body {
        background-color: #fef9f4;
    }

    .card {
        border-radius: 16px;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .btn-warning {
        background-color: #ffa534;
        border: none;
    }

    .btn-warning:hover {
        background-color: #ff8800;
    }

    h1 {
        font-weight: bold;
        color: #ffa534;
    }
</style>

<div class="container py-5">
    <h1 class="text-center mb-5">🍞 Daftar Roti yang Dijual 🍰</h1>

    <div class="row">
        @foreach($kues as $kue)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $kue['nama'] }}</h5>
                        <p class="card-text text-muted mb-4">
                            Harga: <strong>Rp{{ number_format($kue['harga'], 0, ',', '.') }}</strong>
                        </p>

                        {{-- Tombol Beli --}}
                        <a href="{{ route('kue.transaksi') }}" class="btn btn-warning w-100 fw-bold">
                        🛒 Beli Sekarang
                    </a>

                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
