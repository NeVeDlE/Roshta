<?php

namespace App\Http\Livewire\admin;

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
    public $role;
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
        $this->setPage(0);
    }

    public function editPage(Role $role)
    {
        if (!$this->cannotEditAdmin($role->name)) {
            $this->message = 'admin cannot be edited!';
        } else {
            $this->setPage(2);
            $this->name = $role->name;
            $this->role = $role;
        }
    }

    public function editRole()
    {
        Gate::authorize('admin');
        $this->validate();
        if (!$this->cannotEditAdmin($this->name)) {
            $this->message = 'admin cannot be edited!';
        } else {
            $this->role->update(['name' => $this->name]);
            $this->resetForm();
            $this->message = 'Role Edited!';
            $this->setPage(0);
        }
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

    protected function cannotEditAdmin($name): bool
    {
        if ($name == 'admin') return false;
        return true;
    }

    public function render()
    {
        if (Gate::authorize('admin')) {
            if (!$this->page_id)
                return view('livewire.roles.roles-index', [
                    'roles' => Role::filter($this->search)->paginate(10),
                ]);
            else if ($this->page_id == 1) {
                return view('livewire.roles.roles-index');
            } else {
                return view('livewire.roles.roles-index', [
                    'role' => $this->role,
                ]);
            }
        } else {
            return redirect('/');
        }
    }
}
