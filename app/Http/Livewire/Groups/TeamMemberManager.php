<?php

namespace App\Http\Livewire\Groups;

use App\Models\User;
use Livewire\Component;

class TeamMemberManager extends Component
{
    public $group;
    public $roles = [];
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.groups.team-member-manager');
    }
}
