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
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id_transaksi')->unique();
            $table->string('kode_produk_fk');
            $table->integer('jumlah_beli');
            $table->integer('nominal_pembayaran');
            $table->string('metode_pembayaran');
            $table->timestamps();

            $table->foreign('kode_produk_fk')->references('kode_produk')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
