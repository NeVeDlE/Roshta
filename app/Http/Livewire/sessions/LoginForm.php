<?php

namespace App\Http\Livewire\sessions;

use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $show;
    public $password;
    protected $rules = [
        'email' => 'email|required',
        'password' => 'required'
    ];

    public function mount()
    {
        $this->show = false;
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
