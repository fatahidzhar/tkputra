<?php

namespace App\Http\Controllers;

use App\Exports\ExcelPendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelRekapController extends Controller
{
    public function exportExcelRekap() 
    {
        return Excel::download(new ExcelPendaftaran, 'daftar_pd-TK PUTRA IX KELAPA DUA ' . date('Y-m-d') . '.xlsx');
    }
}
