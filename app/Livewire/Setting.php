<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Setting extends Component
{
    public $title = '';
    public $logo = '';
    public $copyright = '';
    public $deadline = '';

    public function render()
    {
        return view('livewire.setting');
    }

    public function store()
    {
        $data = $this->validate([
            'title' => 'required|max:100',
            //'logo' => 'nullable|mimes:png,jpeg,jpg|max:100',
            'copyright' => 'required|max:150',
            'deadline' => 'required|date'
        ]);

        $date = date('Y-m-d', strtotime($this->deadline));
        $config = \App\Models\Setting::firstOrNew();
        config(['settings.title' => $this->title]);
        config(['settings.copyright' => $this->copyright]);
        config(['settings.deadline' => $date]);
        /* if (is_uploaded_file($this->logo)) {
             $path = $this->logo->store(path: 'photos');
             config(['settings.logo' => $path]);
             $data['logo'] = $path;
         }*/
        $data['deadline'] = $date;
        $fp = fopen(base_path() . '/config/settings.php', 'wb');
        fwrite($fp, '<?php return ' . var_export(config('settings'), true) . ';');
        fclose($fp);
        $config->fill($data)->save();
        Artisan::call('optimize:clear');
        session()->flash('success', 'Setting has been updated...');

    }

    public function mount()
    {
        $data = \App\Models\Setting::firstOrNew();
        if ($data) {
            $this->title = $data->title;
            $this->logo = $data->logo;
            $this->copyright = $data->copyright;
            $this->deadline = $data->deadline;
        }
    }
}
