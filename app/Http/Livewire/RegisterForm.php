<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $national_id;
    public $password;
    public $password_confirmation;
    public $birthday;
    public $phone;
    public $picture;
    public $show;


    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|min:5|unique:users,email',
        'national_id' => 'required|string|max:14|min:14|unique:users,national_id',
        'phone' => 'required|string|size:11|unique:users,phone',
        'picture' => ['image'],
        'birthday' => 'required|date',
        'password' => ['required', 'confirmed'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (isset($this->national_id) && isset($this->birthday) && !$this->nationalIDValidation()) {
            $this->addError('birthday',
                'Either your birthdate or the national id is wrong');
            $this->addError('national_id',
                'Either your birthdate or the national id is wrong');
        } else if (isset($this->national_id) && isset($this->birthday) && $this->nationalIDValidation()) {
            $this->resetErrorBag('national_id');
            $this->resetErrorBag('birthday');
        }
        if (isset($this->phone) && !$this->phone()) {
            $this->addError('phone',
                'This is not a valid phone number');
        } else if (isset($this->phone) && !$this->phone()) {
            $this->resetErrorBag('phone');
        }
    }


    protected function phone(): bool
    {
        if ($this->phone[0] != '0' || $this->phone[1] != '1') return false;
        return true;
    }

    protected function nationalIDValidation(): bool
    {

        if (isset($this->national_id) && isset($this->birthday)) {
            $s = explode('-', $this->birthday);
            $time = '';
            for ($i = 0; $i < sizeof($s); $i++) {
                $time .= $s[$i];
            }
            $time[0] = $time[0] + 1;
            $id = explode('-', $this->national_id);

            for ($i = 0; $i < 7; $i++) {

                if ($time[$i] != $id[0][$i]) return false;
            }
        }
        return true;

    }

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
        return view('livewire.register-form');
    }
}
