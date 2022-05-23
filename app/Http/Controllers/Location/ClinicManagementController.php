<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Http\Livewire\pharmacists\PharmacyIndex;
use App\Models\Location;
use Illuminate\Support\Facades\Gate;

class ClinicManagementController extends Controller
{

    public function store(Location $location)
    {

        Gate::authorize('clinic', $location);
        if (\Auth::check() && !$this->requestsNumber()) {
            $location->addExaminationRequest(auth()->user());
            return redirect('/dashboard');
        }
        return redirect('/dashboard');

    }
    protected function requestsNumber(): int
    {
        return sizeof(\DB::table('location_users')
            ->select('location_users.id')
            ->where('location_users.user_id', '=', auth()->id())->get());
    }
}
