<?php

namespace App\Http\Livewire\Groups;

use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Edit extends Component
{
    public $team;

    public function mount($id)
    {
        $this->team = Jetstream::newTeamModel()->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.groups.edit');
    }
}
