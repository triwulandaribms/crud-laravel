<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\produk;

    

class produkController extends Controller
{
    
 
    public function index()
    {
        // FORMAT HTML
        $data_produk = produk::orderBy('kode_produk', 'asc')->get();
        return view('produk.index', compact('data_produk'));

        // FORMAT JSON
        // return produk::orderBy('kode_produk','asc')->get();

    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $kode_produk = $request->kode_produk;

        $cekKode = produk::where('kode_produk', $kode_produk)->exists();

        if ($cekKode) {
            return "kode produk tidak boleh sama";
        }

        produk::create([
            "kode_produk" =>$kode_produk,
            "nama_produk" =>$request->nama_produk,
            "kategori_produk" =>$request->kategori_produk,
            "harga" =>$request->harga,
            "stok" =>$request->stok,

        ]);

        // FORMAT HTML
        return redirect()->to('/produk');

        // FORMAT JSON
        // return "berhasil tambah data";
    }

    public function edit(string $id)
    {
        $data_produk = produk::where('kode_produk', $id)->first();
        return view('produk.edit', compact('data_produk'));
    }

    public function update(Request $request, string $id)
    {
    
        produk::where('kode_produk', $id)->update([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'kategori_produk' => $request->kategori_produk,
            'harga' => $request->harga,            
            'stok' => $request->stok,
        ]);

        // FORMAT HTML
        return redirect()->to('/produk');

        // FORMAT JSON
        // return "Data berhasil di update";
    }

    public function destroy(string $id)
    {
       produk::where('kode_produk', $id)->delete();
       return redirect()->to('/produk');
    }


    //////////////////////////////////////////////////////////////////////////////
    // function untuk menampilkan data berdasarkan id pada format json
    public function show($kode_produk = null)
    {
        if($kode_produk){
            $produk = user::where('id_user', $kode_produk)->get();
            if($produk->isEmpty()){
                return "id user tidak ditemukan";
            }else{
                return $produk;
            }
        }else{
            return user::all();
        }
    }
}


