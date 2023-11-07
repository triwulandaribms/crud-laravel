<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->string('kode_produk');
            $table->unique('kode_produk');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->string('brand');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
