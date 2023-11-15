<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class excelController extends Controller
{
    public function exportToExcel()
    {
        return Excel::download(new laporanExport, 'laporan.xlsx');
    }

    public function exportToPDF()
    {
        $data_laporan = laporan::with('produk', 'transaksi')->get();
    
        $pdf = SnappyPdf::loadView('laporan.export_pdf', compact('data_laporan'));
    
        return $pdf->download('laporan.pdf');
    }
}
