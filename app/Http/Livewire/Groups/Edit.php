<?php

namespace App\Http\Livewire\Groups;

use App\Models\Team;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Edit extends Component
{
    public $group;
    public $user;

    public function mount($id)
    {
        $this->user = auth()->user();
        $this->group = Jetstream::newTeamModel()->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.groups.edit');
    }
}
