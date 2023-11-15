<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    public function index()
    {

        // FORMAT HTML
        $data_transaksi = transaction::orderBy('id_transaksi', 'asc')->get();
        return view('transaction.index', compact('data_transaksi'));

        // FORMAT JSON
        // return produk::orderBy('id_pesanan', 'asc')->get();
    }

    public function create()
    {
        return view('transaction.create');
    }


    
    public function store(Request $request)
    {
        $id_transaksi = $request->id_transaksi;
    
        $cekId = transaction::where('id_transaksi', $id_transaksi)->exists();
    
        if ($cekId) {
            return "ID transaksi tidak boleh sama";
        }
    
        transaction::create([
            "id_transaksi" => $id_transaksi,
            "kode_produk_fk" => $request->kode_produk_fk,
            "jumlah_beli" => $request->jumlah_beli,
            "nominal_pembayaran" => $request->nominal_pembayaran,
            "metode_pembayaran" => $request->metode_pembayaran,
        ]);
    
        // FORMAT HTML
        return redirect()->to('/transaction');
    
        // FORMAT JSON
        // return "Berhasil menambah";
    }

        public function edit(string $id)
    {
        $data_transaksi = transaction::where('id_transaksi',$id)->first();
        return view('transaction.edit', compact('data_transaksi'));
    }



    public function update(Request $request, string $id)
    {
       
        $data = transaction::where('id_transaksi', $id)->update([
            'id_transaksi' => $request->id_transaksi,
            'kode_produk_fk' => $request->kode_produk_fk,
            'jumlah_beli' => $request->jumlah_beli,
            'nominal_pembayaran' => $request->nominal_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        // FORMAT HTML
        return redirect()->to('/transaction');

        // FORMAT JSON
        // return "berhasil edit";
    }



    // untuk menghapus data 
    public function destroy(string $id)
    {
        transaction::where('id_transaksi', $id)->delete();

        return redirect()->to('/transaction');
    }


//////////////////////////////////////////////////////////////////////////////
    // function untuk menampilkan data berdasarkan id pada format json
    public function show($id_transaksi = null)
    {
        if($id_transaksi){
            $transaksi = transaction::where('id_transaksi', $id_transaksi)->get();
            if($transaksi->isEmpty()){
                return "id user tidak ditemukan";
            }else{
                return $transaksi;
            }
        }else{
            return transaction::all();
        }
    }
}
