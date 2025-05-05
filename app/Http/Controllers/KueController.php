<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kue;
use App\Models\Pembeli;
use App\Models\Transaksi;

class KueController extends Controller
{
    public function index()
    {
        // Data kue langsung di-hardcode, tanpa ambil dari database
        $kues = [
            ['nama' => 'Kue Lapis', 'harga' => 15000],
            ['nama' => 'Kue Bolu', 'harga' => 20000],
            ['nama' => 'Kue Nastar', 'harga' => 25000],
            ['nama' => 'Roti Coklat', 'harga' => 15000],
            ['nama' => 'Roti Tawar', 'harga' => 10000],
            ['nama' => 'Donat Gula', 'harga' => 8000],
            ['nama' => 'Brownies Kukus', 'harga' => 30000],
            ['nama' => 'Kue Cubit', 'harga' => 12000],
            ['nama' => 'Kue Putu', 'harga' => 9000],
            ['nama' => 'Bolu Pandan', 'harga' => 18000],
            ['nama' => 'Kue Lumpur', 'harga' => 16000],
            ['nama' => 'Roti Keju Manis', 'harga' => 22000]

        ];

        return view('kue.index', compact('kues'));
    }

    public function show(Kue $kue)
{
    return view('kue.show', compact('kue'));
}

    public function pembelian(Request $request)
    {
        $pembeli = Pembeli::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kue_id' => $request->kue_id,
        ]);

        return redirect()->route('kue.show', ['id' => $request->kue_id])
                         ->with('pembeli_id', $pembeli->id);
    }

    public function transaksi(Request $request)
    {
        $pembeli = Pembeli::findOrFail($request->pembeli_id);
        $kue = Kue::findOrFail($pembeli->kue_id);

        $transaksi = Transaksi::create([
            'pembeli_id' => $pembeli->id,
            'jumlah' => $kue->harga,
            'status' => 'Berhasil',
        ]);

        return view('transaksi', compact('transaksi', 'kue'));
    }
}
