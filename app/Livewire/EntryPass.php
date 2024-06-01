<?php

namespace App\Livewire;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EntryPass extends Component
{
    public $passId;
    public $searchResult;
    public bool $showSearchButton = true;

    public function render()
    {
        return view('livewire.entry-pass');
    }

    public function search()
    {
        $result = Member::select('id', 'company_name', 'name', 'is_entry', 'auth_rep', 'logo', 'image')
            ->where('reg_id', $this->passId)->whereNotNull('auth_rep')->first();

        if ($result) {
            $this->searchResult = $result;
            if ($result->is_entry) {
                session()->flash('warning', 'Already passed!');
                $this->showSearchButton = true;
            } else {
                // Not passed, show pass button
                $this->showSearchButton = false;
            }
        } else {
            $this->searchResult = null;
            $this->resetPassId();
            session()->flash('error', 'ID not found.');
        }
    }


    public function pass()
    {
        if ($this->searchResult) {
            // Update the status in the database
            $this->searchResult->update(['is_entry' => 1, 'entry_by' => Auth::guard()->id()]);
            session()->flash('success', 'Pass granted!');
            $this->resetAll();
        }
    }

    private function resetPassId(): void
    {
        $this->passId = null;
    }

    public function resetAll(): void
    {
        $this->passId = null;
        $this->searchResult = null;
        $this->showSearchButton = true;
    }
}
