@extends('layouts.app')

@section('title', 'Daftar Kue')

@section('content')
    <h1 class="mb-4">Daftar Kue</h1>
    <div class="row">
        @foreach($kues as $kue)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $kue->nama }}</h5>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <a href="{{ route('kue.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
