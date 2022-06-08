<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    @livewire('groups.update-team-name-form', ['group' => $group])

    @livewire('groups.team-member-manager', ['group' => $group])

    @if (Gate::check('delete', $group) && ! $group->personal_team)
        <x-jet-section-border />
    @endif
</div>
