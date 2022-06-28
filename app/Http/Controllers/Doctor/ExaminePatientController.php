<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Examination;
use App\Models\Location;
use App\Models\Medicine;
use App\Models\User;

class ExaminePatientController extends Controller
{
    public function index(Location $location)
    {
        return view('doctors.clinics.examination.index', [
            'clinic' => $location,
        ]);
    }

    public function show(Location $location, User $user)
    {
        return view('doctors.clinics.examination.show', [
            'clinic' => $location,
            'patient' => $user,
        ]);

    }
    public function store(Location $location, User $user)
    {
        request()->validate([
            'report' => ['required', 'string', 'min:2', 'max:255'],
            'diseases' => ["required", 'array', 'min:1'],
            'diseases.*' => ["required", 'exists:diseases,id'],
            'medicines' => ["required", 'array', 'min:1'],
            'medicines.*' => ["required", 'exists:medicines,id'],
        ]);
        $examination = Examination::create([
            'patient_id' => $user->id,
            'doctor_id' => auth()->id(),
            'report' => request()['report'],
        ]);
        foreach (request()['medicines'] as $req) {
            $examination->addMedicine(Medicine::where('id', $req)->first());
        }
        foreach (request()['diseases'] as $req) {
            $examination->addDisease(Disease::where('id', $req)->first());
        }
        \DB::select("update location_users set status='done' where location_id =".auth()->user()->locations->id."
             and user_id=".$user->id);
        return redirect('/dashboard/clinics/index')->with('success', 'Examination is made successfully!');

    }
}
