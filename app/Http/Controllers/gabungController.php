<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gabungController extends Controller
{
    
    public function lihatGabung(){
        $data_tampil = DB::select(' 
        SELECT pro.kode_produk, trans.id_transaksi, pro.nama_produk, pro.kategori_produk, trans.jumlah_beli 
        FROM produks pro INNER JOIN transactions trans ON pro.kode_produk = trans.kode_produk_fk
       ');
       
       return view('laporan.index', compact('data_tampil'));

    }
}
