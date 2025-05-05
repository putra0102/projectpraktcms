<?php

use App\Http\Controllers\KueController;

Route::get('/', [KueController::class, 'index'])->name('kue.index');
Route::get('/kue/{id}', [KueController::class, 'show'])->name('kue.show');
Route::post('/pembelian', [KueController::class, 'pembelian'])->name('kue.pembelian');
Route::post('/transaksi', [KueController::class, 'transaksi'])->name('kue.transaksi');
Route::get('/kue/transaksi', [KueController::class, 'transaksi'])->name('kue.transaksi');
Route::get('/kue/pembelian', [KueController::class, 'pembelian'])->name('kue.pembelian');
Route::get('/kue/{kue}', [KueController::class, 'show']);
