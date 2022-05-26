<?php


namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VerifiedEmailForm extends Component
{    
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.verified-email-form');
    }
}
