<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PharmacyController extends Controller
{
    public function index()
    {
        Gate::authorize('pharmacist');
        return view('pharmacists.pharmacies.create');
    }

    public function store()
    {
        Gate::authorize('pharmacist');
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'lat' => ['numeric', 'required'],
            'lng' => ['numeric', 'required'],
        ]);
        auth()->user()->addLocation(request()->name, request()->lat, request()->lng, 'pharmacy');
        return redirect('/dashboard');
    }
}
