<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    public static function getData(){

        return transaction::join('produks', 'transactions.kode_produk_fk', '=', 'produks.kode_produk')->get(['transactiosn.*', 'produks.nama_produk','produks.harga']);
    }

    protected $fillable = [
        'id_transaksi',
        'kode_produk_fk',
        'jumlah_beli',
        'nominal_pembayaran',
        'metode_pembayaran',
    ];

    public static function getAll(){
        return transaction::all();
    }

    public function transaksi()
    {
        return $this->hasOne(transaction::class, 'kode_produk_fk', 'kode_produk');
    }
}
