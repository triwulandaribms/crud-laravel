<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\dataGabungExport;
use App\Http\Controllers\gabungController; 

class ExcelController extends Controller
{
    public function export(gabungController $gabungController)
    {

        $data = $gabungController->lihatGabung();

        $export = new dataGabungExport($data);
        
        return Excel::download($export, 'dataGabung~'.Carbon::now()->timestamp.'.xlsx');
    }
}


