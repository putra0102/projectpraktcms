@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2>Cek Data Transaksi</h2>

    {{-- Form input ID --}}
    <form action="{{ route('kue.cek') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="number" name="id" class="form-control" placeholder="Masukkan ID Transaksi" required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    {{-- Notifikasi Error --}}
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Jika data ditemukan --}}
    @isset($data)
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4>Detail Transaksi Kue</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $data->id }}</td></tr>
                <tr><th>Nama Kue</th><td>{{ $data->nama_kue }}</td></tr>
                <tr><th>Harga Kue</th><td>{{ number_format($data->harga, 0, ',', '.') }}</td></tr>
            </table>
        </div>
    </div>
    @endisset

    <a href="{{ route('kue.index') }}" class="btn btn-secondary mt-4">Kembali ke Menu Utama</a>

</div>
@endsection