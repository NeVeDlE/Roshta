<?php

namespace App\Http\Livewire\admin;

use App\Models\Medicine;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MedicinesIndex extends Component
{
    use WithPagination, WithFileUploads;

    public $photo;
    public $name;
    public $description;
    public $price;
    public $medicine;
    public $page_id;
    public $message;
    public $search;

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:2',
                isset($this->medicine) ?
                    Rule::unique('medicines', 'name')->ignore($this->medicine) :
                    Rule::unique('medicines', 'name')
            ],
            'price' => 'numeric',
            'photo' => isset($this->medicine) ? isset($this->photo) ? ['image'] : [] : ['required', 'image', 'max:2048'],
            'description' => 'required|string|min:2|max:255',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addMedicine()
    {
        Gate::authorize('admin');
        $atr = $this->validate();
        if (isset($this->photo)) $atr['photo'] = $this->photo->store('Medicine', 'public');
        Medicine::create($atr);
        $this->resetForm();
        $this->message = 'Medicine Created';
        $this->setPage(0);
    }

    public function editMedicine()
    {
        Gate::authorize('admin');
        $atr = array_merge($this->validate(), [
            'photo' => $this->photo ? $this->photo->store('Medicine', 'public') : $this->medicine->photo ?? null,
        ]);
        if ($this->photo) {
            \Storage::disk('public')->delete($this->medicine->photo);
        }

        $this->medicine->update($atr);
        $this->resetForm();
        $this->message = 'Medicine Edited!';
        $this->setPage(0);
    }

    public function editPage(Medicine $medicine)
    {
        $this->name = $medicine->name;
        $this->description = $medicine->description;

        $this->price = $medicine->price;
        $this->medicine = $medicine;
        $this->setPage(2);
    }
    public function deleteMedicine(Medicine $medicine){
        $medicine->delete();
        $this->setPage(0);
    }

    public function resetForm()
    {
        $this->photo = '';
        $this->name = '';
        $this->description = '';
        $this->price = '';
    }

    public function setPage($page_id)
    {
        $this->page_id = $page_id;
    }

    public function mount()
    {
        $this->page_id = 0;
        $this->medicine = 1;
    }

    public function index()
    {
        if (Gate::authorize('admin')) {
            return view('admin.medicines.index');
        } else return redirect('/');
    }

    public function render()
    {
        if (Gate::authorize('admin')) {
            if (!$this->page_id)
                return view('livewire.medicines.medicines-index', [
                    'medicines' => Medicine::filter($this->search)->paginate(10),
                ]);
            else if ($this->page_id == 1) {
                return view('livewire.medicines.medicines-index');
            } else {
                return view('livewire.medicines.medicines-index', [
                    'medicine' => $this->medicine,
                ]);
            }
        } else {
            return redirect('/');
        }
    }
}
