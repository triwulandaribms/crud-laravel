<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class exportFileExcel implements FromCollection, WithHeadings
{
    use HasFactory;
    public function collection(){
        return order::select("id_pesanan", "id_user_fk","kode_produk_fk","tanggal_pemesanan","status","jumlah","total_harga")->get();
    }

    public function headings(): array
    {
        return ["NO","ID USER", "KODE PRODUK", "TANGGAL PEMESANAN", "STATUS", "JUMLAH", "TOTAL HARGA"];
    }
}
