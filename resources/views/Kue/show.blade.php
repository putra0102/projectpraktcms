@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="text-center text-warning mb-4">🛒 Form Pembelian</h3>

                    <form method="POST" action="{{ route('kue.pembelian') }}">
                        @csrf
                        <input type="hidden" name="kue_id" value="{{ $kue->id }}">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold">
                            Kirim Pembelian
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('kue.index') }}" class="btn btn-outline-secondary">← Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
