<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\produk;

    

class produkController extends Controller
{
    
 
    public function index()
    {
        return produk::orderBy('kode_produk', 'asc')->get();
    }

    public function indexKode($kode_produk = null)
    {
        if ($kode_produk) {
            $produk = produk::where('kode_produk', $kode_produk)->get();
    
            if ($produk->isEmpty()) {
                return "Kode produk tidak ditemukan";
            }
    
            return $produk;
        } else {
            return produk::all();
        }
    }
    

    public function store(Request $request)
    {
        $kode_produk = $request->kode_produk;

        $produkExists = produk::where('kode_produk', $kode_produk)->exists();

        if ($produkExists) {
            return "Kode produk sudah ada dalam database. Data tidak dapat ditambahkan.";
        }

        $produk = new produk;
        $produk->kode_produk = $kode_produk;
        $produk->nama_produk = $request->nama_produk; 
        $produk->deskripsi = $request->deskripsi;
        $produk->brand = $request->brand; 
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;  

        if ($produk->save()) {
            return "Data berhasil ditambah";
        } else {
            return "Gagal menambahkan data";
        }
    }


    public function update(Request $request, string $id)
    {
     
        $produk = produk::where('kode_produk', $id)->first();

        if (!$produk) {
            return "Kode produk tidak ditemukan";
        }
    
        produk::where('kode_produk', $id)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'brand' => $request->brand,
            'harga' => $request->harga,            
            'stok' => $request->stok
        ]);

        return "Data berhasil di update";
    }




    public function deleteAll()
    {
        produk::truncate(); 
        return "Semua data produk berhasil dihapus";
    }
 

    public function delete(string $kode_produk)
    {
        $produk = produk::where('kode_produk', $kode_produk)->first();

        if (!$produk) {
            return "Produk dengan kode_produk $kode_produk tidak ditemukan. Data tidak dapat dihapus.";
        }

            $produk->delete();

        return "Data berhasil dihapus";
    }

}
