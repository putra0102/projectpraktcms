<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KueController;
use App\Http\Controllers\ImageController;

// Halaman utama: daftar kue
Route::get('/', [KueController::class, 'index'])->name('kue.index');

// Tampilkan form pembelian
Route::get('/pembelian', [KueController::class, 'showForm'])->name('pembelian.form');

// Simpan data pembeli (form pembelian)
Route::post('/pembelian', [KueController::class, 'pembelian'])->name('kue.pembelian');

// Hapus data pembeli
Route::delete('/pembelis/{id}', [KueController::class, 'hapusPembeli'])->name('pembelis.destroy');

// Tampilkan form transaksi pembelian kue
Route::get('/transaksi/form', [KueController::class, 'formTransaksi'])->name('transaksi.form');

// Simpan data transaksi
Route::post('/transaksi', [KueController::class, 'transaksi'])->name('transaksi.store');

// Tampilkan detail transaksi
Route::get('/transaksi/{id}', [KueController::class, 'showTransaksi'])->name('transaksi.show');

// Tampilkan detail kue tertentu (gunakan model binding Laravel)
Route::get('/kue/{kue}', [KueController::class, 'show'])->name('kue.show');

Route::get('/transaksi', [KueController::class, 'formTransaksi'])->name('kue.transaksi');

Route::get('/pembelian', [KueController::class, 'formPembelian'])->name('kue.pembelian.form');
Route::post('/pembelian', [KueController::class, 'simpanPembelian'])->name('kue.pembelian');

Route::get('/transaksi', [KueController::class, 'formTransaksi'])->name('transaksi.form');
Route::post('/transaksi', [KueController::class, 'storeTransaksi'])->name('transaksi.store');
Route::get('/transaksi/{id}', [KueController::class, 'showTransaksi'])->name('transaksi.show');

Route::get('/pembelian-kue', function () {
    return 'Selamat datang dii halaman Pembelian Kue Online!';
})->middleware('check.age');

Route::get('/upload', [ImageController::class, 'create'])->name('kue.upload');
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/upload/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

Route::get('/cek-transaksi', [KueController::class, 'formCekTransaksi'])->name('form.cek.transaksi');
Route::get('/cek-transaksi/search', [KueController::class, 'cekTransaksi'])->name('kue.cek');