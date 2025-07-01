<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    protected $table = 'AKUN'; // <-- ubah sesuai nama tabel di DB Oracle

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
