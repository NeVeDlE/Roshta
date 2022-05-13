<?php

namespace App\Http\Livewire\pharmacists;

use App\Models\Doctor;
use App\Models\Pharmacist;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PharmacistsCreate extends Component
{
    use WithFileUploads;

    public $degree;
    public $university;
    public $graduate_date;

    protected $rules = [
        'degree' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        'university' => 'required|min:2|max:255',
        'graduate_date' => 'date',
    ];

    public function add()
    {
        //dd($this->degree);
        $atr = array_merge($this->validate(), [
            'user_id' => auth()->id(),
            'status' => 'pending'
        ]);


        $atr['degree'] = $this->degree->store('pharmacists', 'public');


        Pharmacist::create($atr);
        return redirect('/dashboard');
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function index()
    {

        if (Gate::authorize('patient') && !sizeof(Pharmacist::where('user_id', auth()->id())
                ->where('status', '!=', 'cancelled')->get())) {
            return view('patient.pharmacists.create');
        } else abort(403);
    }

    public function render()
    {
        return view('livewire.pharmacists.pharmacists-create');
    }
}
