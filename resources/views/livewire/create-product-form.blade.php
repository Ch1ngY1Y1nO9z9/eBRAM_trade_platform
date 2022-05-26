<x-jet-section-border />

<x-jet-form-section submit="createProduct">
    <x-slot name="title">
        {{ __('Localization') }}
    </x-slot>

    <x-slot name="description">
        {{ __('update your account location for business or order.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="type" value="{{ __('*Product Type') }}" />
            <x-jet-input id="type" type="text" class="mt-1 block w-full" wire:model.defer="products.type" />
            <x-jet-input-error for="products.type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name_en" value="{{ __('*Product Name') }}" />
            <x-jet-input id="name_en" type="text" class="mt-1 block w-full" wire:model.defer="products.name_en" />
            <x-jet-input-error for="products.name_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="detail_en" value="{{ __('*Product Detail') }}" />
            <x-jet-input id="detail_en" type="text" class="mt-1 block w-full" wire:model.defer="products.detail_en" />
            <x-jet-input-error for="products.detail_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unit_price" value="{{ __('*Unit Price') }}" />
            <x-jet-input id="unit_price" type="number" class="mt-1 block w-full" wire:model.defer="products.unit_price" />
            <x-jet-input-error for="products.unit_price" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="discount" value="{{ __('*discount') }}" />
            <x-jet-input id="discount" type="number" class="mt-1 block w-full" wire:model.defer="products.discount" />
            <x-jet-input-error for="products.discount" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="weight" value="{{ __('*Product Weight') }}" />
            <x-jet-input id="weight" type="number" class="mt-1 block w-full" wire:model.defer="products.weight" />
            <x-jet-input-error for="products.weight" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="height" value="{{ __('*Product Height') }}" />
            <x-jet-input id="height" type="number" class="mt-1 block w-full" wire:model.defer="products.height" />
            <x-jet-input-error for="products.height" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="width" value="{{ __('*Product Width') }}" />
            <x-jet-input id="width" type="number" class="mt-1 block w-full" wire:model.defer="products.width" />
            <x-jet-input-error for="products.width" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('*Country') }}" />
            <x-jet-input id="country" type="number" class="mt-1 block w-full" wire:model.defer="products.country" />
            <x-jet-input-error for="products.country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spec_url" value="{{ __('*Spec Url') }}" />
            <x-jet-input id="spec_url" type="number" class="mt-1 block w-full" wire:model.defer="products.spec_url" />
            <x-jet-input-error for="products.spec_url" class="mt-2" />
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
