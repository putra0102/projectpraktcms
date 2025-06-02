<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'telepon'];

    // Relasi ke model Kue
    public function kue()
    {
        return $this->belongsTo(Kue::class, 'kue_id');
    }
}
