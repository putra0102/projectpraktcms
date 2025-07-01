@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Registrasi Akun Baru 📝</h3>
    <form action="{{ route('register.submit') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        @error('email')
            <div class="text-danger mb-3">{{ $message }}</div>
        @enderror
        <button class="btn btn-success w-100">Register</button>
        <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </form>
</div>
@endsection