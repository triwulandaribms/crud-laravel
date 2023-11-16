<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transaction;
use App\Models\produk;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class export implements FromQuery, WithHeadings, ShouldAutoSize, WithColumnWidths, WithMapping,WithStrictNullComparison
{
    use HasFactory;
    public function headings(): array
    {
        return ["id_transaksi","kode_produk","nama_produk","katgeori_produk","jumlah_beli"];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
        ];
    }

    public function query()
    {            
        $data = transaction::select('id_transaksi','kode_produk_fk','nama_produk','kategori_produk','jumlah_beli')
        ->join('produks','transactions.kode_produk_fk', '=', 'produks.kode_produk')
        ->orderby('kode_produk_fk','asc');
        // dd($data);

        return $data;
    }

    public function map($data): array
    {
        return [
            $data->id_transaksi,
            $data->kode_produk_fk,
            $data->nama_produk,
            $data->kategori_produk,
            $data->jumlah_beli,
        ];
    }
}
