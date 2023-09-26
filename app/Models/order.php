<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class order extends Model
{
    use HasFactory;

    public static function getData(){
        return order::join('produks', 'orders.kode_produk_fk', '=', 'produks.kode_produk')->get(['orders.*', 'produks.nama_produk','produks.harga']);
    }
}
