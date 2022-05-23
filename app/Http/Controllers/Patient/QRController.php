<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;

class QRController extends Controller
{
    public function __invoke()
    {
        return view('patient.QR.index');
    }
}
