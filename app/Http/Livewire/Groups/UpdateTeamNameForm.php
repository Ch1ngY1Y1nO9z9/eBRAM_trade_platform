<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;

class UpdateTeamNameForm extends Component
{
    public $group;

    public $roles = [];

    protected $rules = [
        'name' => ['required', 'string', 'max:255']
    ];

    public function render()
    {
        return view('livewire.groups.update-team-name-form');
    }

    public function updateGroupName()
    {
        $this->validate($this->rules);
        $this->group->save();
    }
}
