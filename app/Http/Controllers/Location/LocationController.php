<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationController extends Controller
{
    public function __invoke(Location $location, $lat, $lng)
    {
        return view('auth.locations.show', [
            'location' => $location,
            'speciality' => \DB::table('doctors')
                ->join('specializations', 'specializations.id', '=', 'doctors.specialization_id')
                ->select('specializations.name')
                ->where('doctors.user_id', '=', $location->owner_id)->get(),
            'distance' => round(SQRT(($lat - $location->lat) * ($lat - $location->lat)
                    + ($lng - $location->lng) * ($lng - $location->lng)) * 100, 2),
            'currentLat' => $lat,
            'currentLng' => $lng

        ]);
    }
}
