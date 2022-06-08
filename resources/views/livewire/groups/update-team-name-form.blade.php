<x-jet-form-section submit="updateGroupName">
    <x-slot name="title">
        {{ __('Group Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The Group\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Group Owner Information -->
        <div class="col-span-6">
            <x-jet-label value="{{ __('Group Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $group->owner->profile_photo_url }}" alt="{{ $group->owner->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $group->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $group->owner->email }}</div>
                </div>
            </div>
        </div>
        
        <!-- Group Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Group Name') }}" />

            <x-jet-input id="name"
                        type="text"
                        class="mt-1 block w-full"
                        wire:model.defer="group.name"
                        :disabled="! Gate::check('update', $group)" />

            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $group))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>
