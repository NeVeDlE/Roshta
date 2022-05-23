<?php

namespace App\Http\Livewire\patient;

use Livewire\Component;

class PatientExaminationRequests extends Component
{
    public $search;
    public $lat = 0;
    public $lng = 0;
    protected $listeners = [
        'changeLat', 'changeLng'
    ];

    public function changeLat($value)
    {
        $this->lat = $value;
    }

    public function changeLng($value)
    {
        $this->lng = $value;
    }

    public function index()
    {
        return view('patient.examinationRequests.index');
    }

    public function render()
    {
        return view('livewire.patient.patient-examination-requests', [
            'reqs' => \DB::table('location_users')
                ->join('locations', 'locations.id', '=', 'location_users.location_id')
                ->select('locations.name', 'locations.lat', 'locations.lng', 'location_users.status')
                ->where('location_users.user_id', '=', auth()->id())
                ->where('locations.name', 'like', '%' . $this->search . '%')
                ->orderByRaw('FIELD(location_users.status,"accepted","pending","cancelled")')
                ->paginate(10)
        ]);
    }
}
