@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="text-center text-warning mb-4">🛒 Form Pembelian</h3>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('kue.pembelian') }}">
                        @csrf

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

            {{-- Daftar Pembeli --}}
            <div class="card shadow-sm border-0 mt-5">
                <div class="card-body">
                    <h4 class="mb-3">📋 Daftar Pembeli</h4>

                    @php
                        use App\Models\Pembeli;
                        $pembelis = Pembeli::with('kue')->get();
                    @endphp

                    @if($pembelis->count())
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Pembelian</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pembelis as $pembeli)
                                    <tr>
                                        <td>{{ $pembeli->id }}</td>
                                        <td>{{ $pembeli->nama }}</td>
                                        <td>{{ $pembeli->alamat }}</td>
                                        <td>{{ $pembeli->telepon }}</td>
                                        <td>
                                            <form action="{{ route('pembelis.destroy', $pembeli->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">Belum ada pembeli yang terdaftar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
