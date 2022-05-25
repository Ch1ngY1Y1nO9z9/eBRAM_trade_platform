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

    public function render()
    {
        return view('Livewire.update-profile-localization-form');
    }

    public function updateLocalization($user, array $input)
    {
        dd($user, $input);

        $this->validate();

        Auth::user()->Localization->update([$this->local]);
        $this->emit('saved');
    }
}
