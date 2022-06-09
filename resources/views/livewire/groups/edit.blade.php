<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    @livewire('teams.update-team-name-form', compact('team'))

    @livewire('teams.team-member-manager', compact('team'))

    @if (Gate::check('delete', $team) && ! $team->personal_team)
        <x-jet-section-border />
    @endif
</div>
