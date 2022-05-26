<x-jet-section-border />

<x-jet-form-section submit="updateLocalization">
    <x-slot name="title">
        {{ __('Localization') }}
    </x-slot>

    <x-slot name="description">
        {{ __('update your account location for business or order.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('*Country(select version)') }}" />
            <select id="Taiwan" class="block mt-1 w-full" wire:model.defer="local.country">

                <option value="America" {{ $this->local->country == 'America' ? 'selected' : '' }}>
                    America
                </option>
                <option value="Taiwan" {{ $this->local->country == 'Taiwan' ? 'selected' : '' }}>
                    Tw
                </option>

            </select>
            <x-jet-input-error for="country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('*Country') }}" />
            <x-jet-input id="country" type="text" class="mt-1 block w-full" wire:model.defer="local.country" />
            <x-jet-input-error for="local.country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="dial" value="{{ __('*Country Code') }}" />
            <x-jet-input id="dial" type="text" class="mt-1 block w-full" wire:model.defer="local.dial" />
            <x-jet-input-error for="local.dial" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lang" value="{{ __('*Lang') }}" />
            <x-jet-input id="lang" type="text" class="mt-1 block w-full" wire:model.defer="local.lang" />
            <x-jet-input-error for="local.lang" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="currency" value="{{ __('*Currency') }}" />
            <x-jet-input id="currency" type="text" class="mt-1 block w-full" wire:model.defer="local.currency" />
            <x-jet-input-error for="local.currency" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="timeUTC" value="{{ __('*UTC') }}" />
            <x-jet-input id="timeUTC" type="text" class="mt-1 block w-full" wire:model.defer="local.timeUTC" />
            <x-jet-input-error for="local.timeUTC" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
