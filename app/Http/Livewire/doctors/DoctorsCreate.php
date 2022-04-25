<?php

namespace App\Http\Livewire\doctors;

use App\Models\Doctor;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class DoctorsCreate extends Component
{
    use WithFileUploads;

    public $specialization_id;
    public $degree;
    public $university;
    public $graduate_date;

    protected $rules = [
        'specialization_id' => 'required|exists:specializations,id',
        'degree' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        'university' => 'required|min:2|max:255',
        'graduate_date' => 'date',
    ];

    public function add()
    {
        $atr = array_merge($this->validate(), [
            'user_id' => auth()->id(),
            'status' => 'pending'
        ]);

        $atr['degree'] = $this->degree->store('doctors', 'public');


        Doctor::create($atr);
        return redirect('/dashboard');
    }

    public function mount()
    {
        $this->specialization_id = 1;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetForm()
    {
        $this->specialization = '';
    }

    public function index()
    {
        if (Gate::authorize('patient')) {
            return view('patient.doctors.create');
        } else return redirect('/');
    }

    public function render()
    {
        if (Gate::authorize('patient')) {
            return view('livewire.doctor.doctors-create');
        } else return redirect('/');
    }
}
