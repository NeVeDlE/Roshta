<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Examination;

class ExaminationController extends Controller
{
    public function index()
    {

        return view('patient.examination.index');
    }

    public function buy(Examination $examination, $lat, $lng)
    {

        $pos = \DB::table('location_medicines')
            ->join('locations', 'locations.id', '=', 'location_medicines.location_id')
            ->where('location_medicines.medicine_id', '=', $examination->medicines()->pluck('medicine_id'))
            ->select('locations.lat', 'locations.lng')
            ->orderByRaw("SQRT((locations.lat-{$lat})*(locations.lat-{$lat})+(locations.lng-{$lng})*(locations.lng-{$lng}))")
            ->first();
        return redirect("https://www.google.com/maps/dir/{$lat},{$lng}/{$pos->lat},{$pos->lng}/@{$lat},{$lng},17z");

    }

    public function qr(Examination $examination)
    {
        return view('patient.examination.QR.index', [
            'id' => $examination->id,
        ]);
    }
}
