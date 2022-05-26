<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateAccountForm extends Component
{
    public $account;

    public function mount()
    {
        $this->account = Auth::user()->Account;
    }

    protected $rules = [
        'account.tel' => 'required',
        'account.fax' => 'nullable',
        'account.website' => 'nullable',
        'account.social' => 'nullable',
        'account.address_en' => 'nullable',
        'account.bill_address_en' => 'nullable',
        'account.delivery_address_en' => 'nullable',
        'account.city' => 'nullable',
        'account.detail' => 'nullable',
        'account.status' => 'nullable',
        'account.detail' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.update-account-form'); 
    }

    public function updateAccount()
    {
        $this->validate();

        Auth::user()->Account->update([$this->account]);
        session()->flash('saved', '');
    }
}
