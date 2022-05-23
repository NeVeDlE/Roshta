<?php

namespace App\Http\Livewire\doctors;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ClinicExaminationRequests extends Component
{
    public $search;

    public function accept($id)
    {
        $this->query('accepted', $id);
    }

    public function decline($id)
    {
        $this->query('cancelled', $id);
    }

    public function index()
    {
        Gate::authorize('hasClinic');
        return view('doctors.clinics.index', [
            'clinic' => auth()->user()->locations,
        ]);
    }

    public function render()
    {
        return view('livewire.doctor.clinic-examination-requests', [
            'reqs' => \DB::table('location_users')
                ->join('users', 'users.id', '=', 'location_users.user_id')
                ->select('location_users.status', 'users.name', 'location_users.id')
                ->where('location_users.location_id', '=', auth()->user()->locations->id)
                ->where('users.name', 'like', '%' . $this->search . '%')
                ->orderByRaw('FIELD(status,"pending","accepted","cancelled")')
                ->paginate(10)
        ]);
    }

    protected function query($status, $id)
    {
        \DB::select("update location_users set status='{$status}' where id = {$id}");
    }
}
