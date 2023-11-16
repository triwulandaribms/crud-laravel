<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class dataGabungExport implements FromCollection
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
    
        $transformedData = collect($this->data)->map(function ($item) {
            return [
                'kode_produk' => $item->kode_produk,
                'id_transaksi' => $item->id_transaksi,
                'nama_produk' => $item->nama_produk,
                'kategori_produk' => $item->kategori_produk,
                'jumlah_beli' => $item->jumlah_beli,
            ];
        });

        return new Collection($transformedData);
    }
}
