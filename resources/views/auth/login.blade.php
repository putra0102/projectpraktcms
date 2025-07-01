@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Login Sistem Klinik Gigi 🦷</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('login.submit') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        @error('email')
            <div class="text-danger mb-3">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary w-100">Login</button>
        <p class="text-center mt-3">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </form>
</div>
@endsection