<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // Nama tabel sesuai migration
    protected $table = 'transaksis';

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nama',
            'alamat',
            'telepon',
            'nama_kue',
            'harga',
    ];

    // Jika kamu pakai timestamps, ini default true, jadi bisa dihilangkan
    public $timestamps = true;

    // Jika kamu ingin relasi ke model Pembeli
    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }
}
