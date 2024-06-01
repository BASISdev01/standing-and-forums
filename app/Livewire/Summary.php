<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class Summary extends Component
{
    public function render()
    {
        return view('livewire.summary', [
            'summary' => Member::toBase()
                ->selectRaw("COUNT(CASE WHEN auth_rep IS NOT NULL THEN 1 END) AS registration")
                ->selectRaw("COUNT(CASE WHEN is_entry=1 AND auth_rep IS NOT NULL THEN 1 END) as passed")
                ->selectRaw("COUNT(CASE WHEN is_entry=0 AND auth_rep IS NOT NULL THEN 1 END) as remaining")
                ->selectRaw("COUNT(CASE WHEN DATE(created_at) = CURDATE() AND auth_rep IS NOT NULL THEN 1 END) AS today_registration")
                ->first()
        ]);
    }
}
