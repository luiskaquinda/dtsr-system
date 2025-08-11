<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Repport implements FromView, ShouldAutoSize
{
    public function view()
    {
        return view('your view', compact('data'));
    }

}
