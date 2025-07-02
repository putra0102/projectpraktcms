<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Kue;
use App\Models\Pembeli;
use App\Models\Transaksi;

class KueController extends Controller
{
    public function index()
    {
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

    // Saya hapus method store() karena tidak digunakan dan tidak konsisten

   public function formPembelian()
    {
        return view('kue.pembelian'); // Blade view Anda tadi
    }

    public function simpanPembelian(Request $request)
{
    try {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric',
        ]);

        Pembeli::create($validated);

        return redirect()->route('kue.pembelian.form')
            ->with('success', 'Pembelian berhasil disimpan!');
    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan. Silakan coba lagii.');
    }
}


    public function formTransaksi()
    {
        return view('kue.show'); // pastikan view ini ada
    }

    // Menyimpan data transaksi dari form
    public function storeTransaksi(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'nama_kue' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($validated);

        return redirect()->route('transaksi.show', $transaksi->id)
                         ->with('success', 'Transaksi berhasil disimpan!');
    }

    // Menampilkan detail transaksi
    public function showTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('kue.show', compact('transaksi'));
    }


    public function showForm()
    {
        $pembelis = Pembeli::all();
        return view('kue.pembelian', compact('pembelis'));
    }

    public function formCekTransaksi()
    {
        session(['type' => 'cek']);
        return view('kue.cek');
    }

    public function cekTransaksi(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);

        try {
            $data = Transaksi::findOrFail($request->id);
            return view('kue.cek', compact('data'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('form.cek.transaksi')->withErrors('Transaksi tidak ditemukan.');
        }
    }

    public function hapusPembeli($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();

        // Redirect ke form pembelian yang sudah ada daftar pembeli
        return redirect()->route('kue.pembelian.form')->with('success', 'Data berhasil dihapus.');
    }
}
