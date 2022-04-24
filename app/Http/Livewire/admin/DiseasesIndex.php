<?php

namespace App\Http\Livewire\admin;

use App\Models\Disease;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DiseasesIndex extends Component
{
    public $name;
    public $description;
    public $page_id;
    public $message;
    public $search;
    public $disease;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:2',
                isset($this->disease) ?
                    Rule::unique('diseases', 'name')->ignore($this->disease) :
                    Rule::unique('diseases', 'name')
            ],

            'description' => 'required|string|min:2|max:255',
        ];
    }

    public function addDisease()
    {
        Gate::authorize('admin');
        $atr = $this->validate();
        Disease::create($atr);
        $this->resetForm();
        $this->message = 'Disease Created';
        $this->setPage(0);
    }

    public function editDisease()
    {
        Gate::authorize('admin');
        $atr = $this->validate();
        $this->disease->update($atr);
        $this->resetForm();
        $this->message = 'Disease Edited!';
        $this->setPage(0);
    }

    public function mount()
    {
        $this->page_id = 0;
    }

    public function editPage(Disease $disease)
    {
        $this->name = $disease->name;
        $this->description = $disease->description;
        $this->disease = $disease;
        $this->setPage(2);
    }

    public function deleteDisease(Disease $disease)
    {
        $disease->delete();
        $this->message = 'Disease Deleted';
        $this->setPage(0);
    }

    public function setPage($page_id)
    {
        $this->page_id = $page_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetForm()
    {
        $this->name = '';
        $this->description = '';
    }


    public function index()
    {
        if (Gate::authorize('admin')) {
            return view('admin.diseases.index');
        } else return redirect('/');
    }

    public function render()
    {
        if (Gate::authorize('admin')) {
            if (!$this->page_id)
                return view('livewire.diseases.diseases-index', [
                    'diseases' => Disease::filter($this->search)->paginate(10),
                ]);
            else if ($this->page_id == 1) {
                return view('livewire.diseases.diseases-index');
            } else {
                return view('livewire.diseases.diseases-index', [
                    'disease' => $this->disease,
                ]);
            }

        } else {
            return redirect('/');
        }
    }
}
