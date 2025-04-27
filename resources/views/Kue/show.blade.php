@extends('layouts.app')

@section('title', $kue->nama)

@section('content')
    <h1>{{ $kue->nama }}</h1>
    <p>{{ $kue->deskripsi }}</p>
    <a href="{{ route('kue.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
@endsection
