<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateProfileLocalizationForm extends Component
{
    public $local;

    public function mount()
    {
        $this->local = Auth::user()->Localization;
    }

    protected $rules = [
        'local.country' => 'required',
        'local.dial' => 'required',
        'local.lang' => 'required',
        'local.currency' => 'required',
        'local.timeUTC' => 'required',
    ];

    protected $messages = [
        'local.country.required' => 'Country cannot be empty.',
        'local.dial.required' => "Country Code cannot be empty.",
        'local.lang.required' => "Lang cannot be empty.",
        'local.currency.required' => "Currency can not be empty.",
        'local.timeUTC.required' => "Timezone can not be empty.",
    ];

    public function render()
    {
        return view('livewire.update-profile-localization-form');
    }

    public function submit()
    {
        $this->validate();

        if($this->local->save()){
            $this->emit('saved');
        }

    }
}
