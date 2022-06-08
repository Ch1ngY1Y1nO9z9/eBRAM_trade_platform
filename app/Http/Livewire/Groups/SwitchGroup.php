<?php

namespace App\Http\Livewire\Groups;

use Livewire\Component;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class SwitchGroup extends Component
{
    public function update(Request $request)
    {
        $team = Jetstream::newTeamModel()->findOrFail($request->team_id);

        if (! $request->user()->switchTeam($team)) {
            abort(403);
        }

        return redirect('/case/management', 303);
    }
}
