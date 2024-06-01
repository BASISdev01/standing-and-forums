<?php

namespace App\Livewire;

use App\AppConstant;
use App\Models\Member;
use App\Models\MemberList;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Mockery\Exception;

class RegistrationList extends Component
{
    use WithPagination;

    #[Url]
    public $company_name = '';
    #[Url]
    public $rep_name = '';
    #[Url]
    public $reg_id = '';
    #[Url]
    public $mobile = '';
    #[Url]
    public $type = '';
    #[Url]
    public $reg_type = '';
    #[Url]
    public $pass = '';
    #[Url]
    public $date = '';

    public function render()
    {
        return view('livewire.registration-list', [
            'registrations' => Member::orderBy('reg_id', 'desc')
                ->when($this->company_name, fn($query) => $query->where('company_name', 'like', "%{$this->company_name}%"))
                ->when($this->rep_name, fn($query) => $query->where('name', 'like', "%{$this->rep_name}%"))
                ->when($this->reg_id, fn($query) => $query->where('reg_id', $this->reg_id))
                ->when($this->mobile, fn($query) => $query->where('mobile', $this->mobile))
                ->when($this->type, fn($query) => $query->where('auth_rep', $this->type))
                ->when($this->pass, fn($query) => $query->where('is_entry', $this->pass == 2 ? '0' : 1))
                ->when($this->reg_type, fn($query) => $query->where('is_manual', $this->reg_type == 2 ? '0' : 1))
                ->when($this->date, fn($query) => $query->whereDate('created_at', $this->date))
                ->whereNotNull('auth_rep')
                ->paginate(20)
                ->withQueryString(),
            'userTypes' => AppConstant::getTypes(),
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div>
           <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>
           </div>
        </div>
        HTML;
    }

    public function delete($id): void
    {
        try {
            Member::find($id)->delete();
            session()->flash('success', 'Member has been deleted.');
        } catch (Exception) {
            session()->flash('error', 'Something went wrong...');
        }
    }

    public function updateName($id): void
    {
        $memberList = MemberList::where('membership_no', $id)->first();
        if ($memberList) {
            Member::where('membership_id', $id)->where('auth_rep', 'YES')->update([
                'name' => $memberList->name,
                'mobile' => $memberList->mobile,
            ]);
        }

    }

    public function saveImage($path): void
    {
        if ($path) {
            $imageName = pathinfo($path, PATHINFO_BASENAME);
            $imageContent = file_get_contents($path);
            Storage::put('public/images/' . $imageName, $imageContent);
        }
    }

    public function updating()
    {
        // Set isLoading to true before applying filters
        $this->isLoading = true;
    }

    public function updated()
    {
        // Set isLoading to false after filters have been applied
        $this->isLoading = false;
    }

    public function resetFiltering(): void
    {
        $this->reset(['company_name', 'rep_name', 'reg_id', 'mobile', 'type', 'pass', 'reg_type', 'date']);
    }


}
