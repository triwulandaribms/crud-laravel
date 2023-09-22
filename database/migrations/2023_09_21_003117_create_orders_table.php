<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id_pesanan')->unique();
            $table->string('id_user_fk');
            $table->string('kode_produk_fk');
            $table->timestamp('tanggal_pemesanan');
            $table->string('status');
            $table->string('jumlah');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_user_fk')->references('id_user')->on('users');
            $table->foreign('kode_produk_fk')->references('kode_produk')->on('produks');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
