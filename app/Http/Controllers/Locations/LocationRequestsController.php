<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Location;

class LocationRequestsController extends Controller
{
    public function __invoke()
    {
        return view('both.locations.index', [
            'req' => Location::where('owner_id', auth()->id())->first(),
        ]);
    }
}
