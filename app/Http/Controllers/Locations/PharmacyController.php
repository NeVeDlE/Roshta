<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Gate;

class PharmacyController extends Controller
{
    public function index()
    {
        Gate::authorize('pharmacist');
        if ($this->multiItem()) {
            return redirect('/dashboard');
        }
        return view('pharmacists.pharmacies.create');
    }

    public function store()
    {
        Gate::authorize('pharmacist');
        if ($this->multiItem()) {
            return redirect('/dashboard');
        }
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'lat' => ['numeric', 'required'],
            'lng' => ['numeric', 'required'],
        ]);
        auth()->user()->addLocation(request()->name, request()->lat, request()->lng, 'pharmacy');
        return redirect('/dashboard');
    }

    public function multiItem()
    {
        if (sizeof(Location::where('owner_id', auth()->id())->get()) > 1) return true;
        return false;
    }
}
