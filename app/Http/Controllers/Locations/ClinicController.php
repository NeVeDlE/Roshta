<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Support\Facades\Gate;

class ClinicController extends Controller
{
    public function index()
    {
        Gate::authorize('doctor');
        if ($this->multiItem()) {
            return redirect('/dashboard');
        }
        return view('doctors.clinics.create');
    }

    public function store()
    {
        Gate::authorize('doctor');
        if ($this->multiItem()) {
            return redirect('/dashboard');
        }
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'lat' => ['numeric', 'required'],
            'lng' => ['numeric', 'required'],
        ]);
        auth()->user()->addLocation(request()->name, request()->lat, request()->lng, 'clinic');
        return redirect('/dashboard');
    }

    public function multiItem()
    {
        if (sizeof(Location::where('owner_id', auth()->id())->get()) > 1) return true;
        return false;
    }
}
