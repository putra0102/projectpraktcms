@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h3 class="text-center text-warning mb-4">🧁 Form Transaksi Pembelian Kue</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transaksi.store') }}" method="POST" id="formTransaksi">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kue" class="form-label">Nama Kue</label>
                            <input type="text" name="nama_kue" id="nama_kue" class="form-control" value="{{ old('nama_kue') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="{{ old('harga') }}" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold">
                            Kirim Pembelian
                        </button>
                    </form>
                </div>
            </div>

            @isset($transaksi)
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="text-center text-success mb-4">✅ Detail Transaksi Pembelian</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Nomor Transaksi</th>
                                <td>{{ $transaksi->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pembeli</th>
                                <td>{{ $transaksi->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $transaksi->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $transaksi->telepon }}</td>
                            </tr>
                            <tr>
                                <th>Nama Kue</th>
                                <td>{{ $transaksi->nama_kue }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endisset

            <div class="text-center mt-4">
                <a href="{{ route('kue.index') }}" class="btn btn-outline-secondary">← Kembali ke Beranda</a>
            </div>

        </div>
    </div>
</div>
@endsection
