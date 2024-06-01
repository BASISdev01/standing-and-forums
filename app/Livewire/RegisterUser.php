<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class RegisterUser extends Component
{
    public $company_name = '';
    public $name = '';
    public $email = '';
    public $mobile = '';
    public $type = '';

    public function register()
    {
        $validated = $this->validate([
            'company_name' => 'nullable|max:160',
            'name' => 'required|max:150',
            'email' => 'required|email|unique:members,email',
            'mobile' => 'nullable|digits:11',
            'type' => 'required',
        ]);

        // $this->emit('userRegistered');
    }

    public function render()
    {
        return view('livewire.register-user');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
}
