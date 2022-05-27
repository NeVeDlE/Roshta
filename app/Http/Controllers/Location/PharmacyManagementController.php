<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\Examination;
use App\Models\User;

class PharmacyManagementController extends Controller
{
    public function index()
    {
        \Gate::authorize('hasPharmacy');
        return view('pharmacists.pharmacies.roshta.index', [
            'pharmacy' => auth()->user()->locations,
        ]);
    }

    public function create(Examination $examination)
    {
        return view('pharmacists.pharmacies.roshta.show', [
            'patient' => User::where('id', $examination->patient_id)->first(),
            'examination' => $examination,
            'medicines' => $examination->medicines,
        ]);
    }

    public function store(Examination $examination)
    {
        $meds = $examination->medicines()->pluck('medicine_id')->toArray();
        if (sizeof($this->checkForQuantity($meds))) {
            return redirect('/dashboard')->with('success', "Some Medicines doesn't exist here");
        }
        \DB::select("update location_medicines set quantity = quantity-1 where id
             in (" . implode(',', $meds) . ") and quantity >0 and location_id = {auth()->user()->locations->id}");

        return redirect('/dashboard')->with('success', "Roshta was sold to {$examination->patient->name}");
    }

    public function checkForQuantity($meds): \Illuminate\Support\Collection
    {
        return \DB::table('location_medicines')
            ->select('id')
            ->whereIn('medicine_id', $meds)
            ->where('quantity', '<', '0')
            ->where('id', auth()->user()->locations->id)
            ->get();
    }
}
