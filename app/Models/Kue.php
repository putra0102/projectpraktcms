<?php

namespace App\Models;

class Kue
{
    // Fungsi "seolah-olah" mengambil dari database
    protected static function getDummyData()
    {
    return [
        [
            'id' => 1,
            'title' => 'detail kue',
            'content' => [
                ['id_kue' => '1', 'harga' => '200000', 'nama' => 'Lapis Legit'],
                ['id_kue' => '2', 'harga' => '350000', 'nama' => 'Bolu'],
                ['id_kue' => '3', 'harga' => '400000', 'nama' => 'Brownies'],
            ],
        ],
        [
            'id' => 2,
            'title' => 'pemesanan kue',
            'content' => [
                'opsi_kue' => ['Lapis Legit', 'Bolu', 'Brownies'],
                'pengambilan' => ['diambil', 'dikirim']
            ]
        ]
    ];


    }

    // Mengambil semua data
    public static function all()
    {
        return self::getDummyData();
    }

    // Mencari satu data berdasarkan id
    public static function find($id)
    {
        $kues = self::getDummyData();
        foreach ($kues as $kue) {
            if ($kue['id'] == $id) {
                return $kue;
            }
        }
        return null;
    }
}