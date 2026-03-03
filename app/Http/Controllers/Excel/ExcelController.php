<?php

namespace App\Http\Controllers\Excel;

use App\Exports\Repport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    public function xlsxDownload()
    {
        return Excel::download(new Repport(), 'file-name.xlsx');
    }

}
