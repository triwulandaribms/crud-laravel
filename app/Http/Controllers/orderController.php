<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;
use App\Models\exportFileExcel;
use Maatwebsite\Excel\Facades\Excel;


class orderController extends Controller
{
   
    public function index()
    {
        return order::orderBy('id_pesanan', 'asc')->get();
    }
    

    public function indexOrderId($id_pesanan = null)
    {
        if ($id_pesanan) {
            $order = order::where('id_pesanan', $id_pesanan)->get();
    
            if ($order->isEmpty()) {
                return "Kode produk tidak ditemukan";
            }
    
            return $order;
        } else {
            return order::all();
        }
    }


    public function store(Request $request)
    {
        $existingOrder = order::where('id_pesanan', $request->id_pesanan)->first();

        if ($existingOrder) {
            return "ID pesanan sudah ada dalam database";
        }

        $order = new order;
        $order->id_pesanan = $request->id_pesanan;
        $order->id_user_fk = $request->id_user_fk;
        $order->kode_produk_fk = $request->kode_produk_fk; 
        $order->tanggal_pemesanan = $request->tanggal_pemesanan; 
        $order->status = $request->status; 
        $order->jumlah = $request->jumlah;
        $order->total_harga = $request->total_harga;
        $order->save();

        return "Data berhasil ditambah";
    }

    public function show(string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }

    public function exportExcel(){
        ini_set('memory_limit', '2048M');
        ini_set('max_execution_time', 600);
        ini_set('max_input_time', 600);
        ini_set('post_max_size', '2048M');
        return Excel::download(new exportFileExcel, 'dataPemesanan.xlsx');
    }
}
