<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;


class Create extends Component
{
    public $user;
    public $name;
    public $default_member;

    protected $rules = [
        'name' => ['required', 'string', 'max:255']
    ];


    public function mount()
    {
        $this->user = auth()->user();
        if(isset($_GET['with'])){
            $this->default_member = $_GET['with'];
        }else{
            $this->default_member = '';
        }
    }


    public function render()
    {
        return view('livewire.groups.create');
    }

    public function createGroup()
    {
        Gate::forUser($this->user)->authorize('create', Jetstream::newTeamModel());

        $this->validate();

        AddingTeam::dispatch($this->user);

        $this->user->switchTeam($group = $this->user->ownedTeams()->create([
            'name' => $this->name,
            'personal_team' => false,
        ]));

        return redirect('/case/management/edit/'.$group->id);
    }
}
