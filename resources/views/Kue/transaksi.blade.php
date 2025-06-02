@extends('layouts.app')

@section('content')
@include('layouts.navbar')

<h2>Detail Transaksi</h2>
<p>ID Transaksi: {{ $transaksi->id }}</p>
<p>Kue: {{ $kue->nama }}</p>
<p>Harga: Rp{{ number_format($transaksi->jumlah) }}</p>
<p>Status: {{ $transaksi->status }}</p> 

<br>
<a href="{{ route('kue.index') }}"><button>Kembali ke Index</button></a>
@endsection
