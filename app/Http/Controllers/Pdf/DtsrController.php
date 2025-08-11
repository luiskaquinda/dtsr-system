<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DtsrController extends Controller
{
    // public function pdfStream()
    // {
    //     return Pdf::loadView('your view', compact('data'))
    //         ->setPaper('a4', 'landscape')
    //         ->stream('file-name.pdf');
    // }

    // public function download()
    // {
    //     $data = ['valor' => 1];
    //     $pdf = Pdf::loadView('your view', $data);

    //     return $pdf->download('file-name.pdf');
    // }

}
