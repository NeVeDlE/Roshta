<?php

namespace App\Http\Livewire\roles;

use App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class RolesIndex extends Component
{
    use WithPagination;

    public $name;
    public $page_id;
    public $message;
    public $search;
    protected $rules = [
        'name' => 'required|unique:roles,name|min:2|max:255',
    ];

    public function mount()
    {
        $this->page_id = 0;
    }

    public function setPage($page_id)
    {
        $this->page_id = $page_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addRole()
    {
        Gate::authorize('admin');
        $this->validate();
        auth()->user()->addRole($this->name);
        $this->resetForm();
        $this->message = 'Role Added!';
        return redirect('dashboard/roles');

    }

    public function deleteRole(Role $role)
    {
        Gate::authorize('admin');
        $role->delete();
    }

    public function resetForm()
    {
        $this->name = '';
    }

    public function render()
    {
        if (Gate::authorize('admin')) {
            if (!$this->page_id)
                return view('livewire.roles.roles-index', [
                    'roles' => Role::filter($this->search)->paginate(10),
                ]);
            else {
                return view('livewire.roles.roles-index');
            }
        } else {
            return redirect('/');
        }
    }
}
