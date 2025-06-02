<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaksi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    protected $model = Transaksi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daftarKue = [
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
            ['nama' => 'Roti Keju Manis', 'harga' => 22000],
        ];

        $kue = $this->faker->randomElement($daftarKue);

        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'telepon' => $this->faker->phoneNumber,
            'nama_kue' => $kue['nama'],
            'harga' => $kue['harga'],
        ];
    }
}
