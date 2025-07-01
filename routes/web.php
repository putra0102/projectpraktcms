<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KueController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| ROUTE UTAMA — HALAMAN AWAL
|--------------------------------------------------------------------------
*/

// Halaman utama langsung tampilkan daftar kue
Route::get('/', [KueController::class, 'index'])->name('kue.index');


/*
|--------------------------------------------------------------------------
| AUTENTIKASI
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| FITUR KUE
|--------------------------------------------------------------------------
*/

// Detail kue
Route::get('/kue/{kue}', [KueController::class, 'show'])->name('kue.show');


/*
|--------------------------------------------------------------------------
| PEMBELIAN
|--------------------------------------------------------------------------
*/

Route::get('/pembelian', [KueController::class, 'formPembelian'])->name('kue.pembelian.form');
Route::post('/pembelian', [KueController::class, 'simpanPembelian'])->name('kue.pembelian');
Route::delete('/pembelis/{id}', [KueController::class, 'hapusPembeli'])->name('pembelis.destroy');


/*
|--------------------------------------------------------------------------
| TRANSAKSI
|--------------------------------------------------------------------------
*/

Route::get('/transaksi', [KueController::class, 'formTransaksi'])->name('transaksi.form');
Route::post('/transaksi', [KueController::class, 'storeTransaksi'])->name('transaksi.store');
Route::get('/transaksi/{id}', [KueController::class, 'showTransaksi'])->name('transaksi.show');


/*
|--------------------------------------------------------------------------
| CEK TRANSAKSI
|--------------------------------------------------------------------------
*/

Route::get('/cek-transaksi', [KueController::class, 'formCekTransaksi'])->name('form.cek.transaksi');
Route::get('/cek-transaksi/search', [KueController::class, 'cekTransaksi'])->name('kue.cek');


/*
|--------------------------------------------------------------------------
| UPLOAD FOTO
|--------------------------------------------------------------------------
*/

Route::get('/upload', [ImageController::class, 'create'])->name('kue.upload');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

