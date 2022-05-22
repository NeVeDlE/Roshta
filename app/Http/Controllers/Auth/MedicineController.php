<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function __invoke(Medicine $medicine, $lat, $lng)
    {
        return view('auth.medicines.show', [
            'medicine' => $medicine,
            'pos' => \DB::select("select l.lat,l.lng from locations l
        join location_medicines lm on l.id = lm.location_id where lm.medicine_id={$medicine->id}
        and lm.quantity order by SQRT((l.lat-{$lat})*(l.lat-{$lat})+(l.lng-{$lng})*(l.lng-{$lng}))
        limit 1"),
            'currentLat' => $lat,
            'currentLng' => $lng

        ]);
    }
}
