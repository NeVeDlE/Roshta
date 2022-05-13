<?php

namespace App\Http\Livewire\jobs;

use App\Models\Doctor;
use App\Models\Pharmacist;
use Livewire\Component;

class JobsIndex extends Component
{

    public $search;

    public function index()
    {
        return view('patient.jobsRequests.index');
    }

    public function render()
    {
        $job = Doctor::where('user_id', auth()->id())->latest()->first();
        if ($job == null) $job = Pharmacist::where('user_id', auth()->id())->latest()->first();
        return view('livewire.jobs.jobs-index', [
            'job' => $job,
        ]);
    }
}
