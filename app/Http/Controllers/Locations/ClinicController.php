<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ClinicController extends Controller
{
    public function index()
    {
        Gate::authorize('doctor');
        return view('doctors.clinics.create');
    }

    public function store()
    {
        Gate::authorize('doctor');
        request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:2'],
            'lat' => ['numeric', 'required'],
            'lng' => ['numeric', 'required'],
        ]);
        auth()->user()->addLocation(request()->name, request()->lat, request()->lng, 'clinic');
        return redirect('/dashboard');
    }
}
