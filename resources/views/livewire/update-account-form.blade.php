<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('update your account detail.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="tel" value="{{ __('*Tel') }}" />
            <x-jet-input id="tel" type="text" class="mt-1 block w-full" wire:model="account.tel" />
            <x-jet-input-error for="account.tel" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fax" value="{{ __('Fax') }}" />
            <x-jet-input id="fax" type="text" class="mt-1 block w-full" wire:model="account.fax" />
            <x-jet-input-error for="account.fax" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="website" value="{{ __('Website') }}" />
            <x-jet-input id="website" type="text" class="mt-1 block w-full" wire:model="account.website" />
            <x-jet-input-error for="account.website" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="social" value="{{ __('Social') }}" />
            <x-jet-input id="social" type="text" class="mt-1 block w-full" wire:model="account.social" />
            <x-jet-input-error for="account.social" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address_en" value="{{ __('Address') }}" />
            <x-jet-input id="address_en" type="text" class="mt-1 block w-full" wire:model="account.address_en" />
            <x-jet-input-error for="account.address_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bill_address_en" value="{{ __('Bill Address') }}" />
            <x-jet-input id="bill_address_en" type="text" class="mt-1 block w-full"
                wire:model="account.bill_address_en" />
            <x-jet-input-error for="account.bill_address_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="delivery_address_en" value="{{ __('Delivery Address') }}" />
            <x-jet-input id="delivery_address_en" type="text" class="mt-1 block w-full"
                wire:model="account.delivery_address_en" />
            <x-jet-input-error for="account.delivery_address_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model="account.city" />
            <x-jet-input-error for="account.city" class="mt-2" />
        </div>

        {{-- <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="detail" value="{{ __('Detail') }}" />
            <x-jet-input id="detail" type="text" class="mt-1 block w-full" wire:model="account.detail" />
            <x-jet-input-error for="account.detail" class="mt-2" />
        </div> --}}

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="status" value="{{ __('Status') }}" />
            <x-jet-input id="status" type="text" class="mt-1 block w-full" wire:model="account.status" />
            <x-jet-input-error for="account.status" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="detail" value="{{ __('Detail') }}" />
            <textarea class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out mt-1" id="detail" cols="30" rows="10" wire:model="account.detail"></textarea>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" >
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
