<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // kolom id sebagai primary key
            $table->string('nama');      // nama pembeli
            $table->string('alamat');    // alamat pembeli
            $table->string('telepon');   // nomor telepon pembeli
            $table->string('nama_kue');  // nama kue yang dibeli
            $table->integer('harga');    // harga kue (integer)
            $table->timestamps();        // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
