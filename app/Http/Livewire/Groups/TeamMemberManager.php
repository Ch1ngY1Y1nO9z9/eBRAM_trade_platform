<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;

class TeamMemberManager extends Component
{
    public $group;
    public $roles = [];

    public function render()
    {
        return view('livewire.groups.team-member-manager');
    }
}
