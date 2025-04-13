<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KueController;

Route::get('/kues', [KueController::class, 'index']);
Route::get('/kues/{id}', [KueController::class, 'show']); 
Route::post('/kues/pesan', function () {
    // Tangani logika pemesanan di sini
    return back()->with('success', 'Pesanan berhasil dikirim!');
});
