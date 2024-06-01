<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserManagement extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.user-management', [
            'users' => Admin::withCount('entries','registrations')->latest()->whereRole('0')->simplePaginate(10)
        ]);
    }

    #[Validate('required|min:2|max:100')]
    public $name = '';
    #[Validate('required|email|unique:admins,email')]
    public $email = '';
    #[Validate('required|min:6|string')]
    public $password = '';

    public function store()
    {
        $this->validate();
        Admin::create($this->all());
        $this->reset();
        session()->flash('success', 'User has been created successfully.');
        $this->render();
    }

    public function delete($id)
    {
        Admin::whereRole('0')->whereId($id)->delete();
        session()->flash('success','User has been deleted.');
    }
}
