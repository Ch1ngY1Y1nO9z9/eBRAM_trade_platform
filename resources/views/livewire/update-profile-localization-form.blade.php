<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Localization') }}
    </x-slot>

    <x-slot name="description">
        {{ __('update your account location for business or order.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="phone_1" value="{{ __('*Country') }}" />
            <select
                class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 w-full mt-1" wire:model.defer="local.country">
                <option hidden value="-">
                    -
                </option>
                <option value="hk">
                    Hong Kong
                </option>
                <option value="jp">
                    Japan
                </option>
                <option value="usa">
                    America
                </option>
                <option value="tw">
                    Taiwan
                </option>
            </select>
            <x-jet-input-error for="phone_1" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="dial" value="{{ __('*Country Code') }}" />
            <x-jet-input id="dial" type="text" class="mt-1 block w-full" wire:model.defer="local.dial" />
            <x-jet-input-error for="local.dial" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="lang" value="{{ __('*Lang') }}" />
            <x-jet-input id="lang" type="text" class="mt-1 block w-full" wire:model.defer="local.lang" />
            <x-jet-input-error for="local.lang" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="currency" value="{{ __('*Currency') }}" />
            <x-jet-input id="currency" type="text" class="mt-1 block w-full" wire:model.defer="local.currency" />
            <x-jet-input-error for="local.currency" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="timeUTC" value="{{ __('*UTC') }}" />
            <x-jet-input id="timeUTC" type="text" class="mt-1 block w-full" wire:model.defer="local.timeUTC" />
            <x-jet-input-error for="local.timeUTC" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" >
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
