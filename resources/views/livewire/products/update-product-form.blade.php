<x-jet-form-section submit="update(Object.fromEntries(new FormData($event.target)))">
    <x-slot name="title">
        {{ __('Product Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('create your own product for buyer.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="type" value="{{ __('*Product Type') }}" />
            <x-jet-input id="type" type="text" class="mt-1 block w-full" wire:model="product.type" />
            <x-jet-input-error for="product.type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="product_name_en" value="{{ __('*Product Name') }}" />
            <x-jet-input id="product_name_en" type="text" class="mt-1 block w-full"
                wire:model="product.product_name_en" />
            <x-jet-input-error for="product.product_name_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="detail_en" value="{{ __('*Product Detail') }}" />
            <x-jet-input id="detail_en" type="text" class="mt-1 block w-full" wire:model="product.detail_en" />
            <x-jet-input-error for="product.detail_en" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unit_price" value="{{ __('*Unit Price') }}" />
            <x-jet-input id="unit_price" type="number" class="mt-1 block w-full" wire:model="product.unit_price" />
            <x-jet-input-error for="product.unit_price" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="discount" value="{{ __('discount') }}" />
            <x-jet-input id="discount" type="number" class="mt-1 block w-full" wire:model="product.discount" />
            <x-jet-input-error for="product.discount" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="weight" value="{{ __('Product Weight') }}" />
            <x-jet-input id="weight" type="number" class="mt-1 block w-full" wire:model="product.weight" />
            <x-jet-input-error for="product.weight" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="height" value="{{ __('Product Height') }}" />
            <x-jet-input id="height" type="number" class="mt-1 block w-full" wire:model="product.height" />
            <x-jet-input-error for="product.height" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="width" value="{{ __('Product Width') }}" />
            <x-jet-input id="width" type="number" class="mt-1 block w-full" wire:model="product.width" />
            <x-jet-input-error for="product.width" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('Country') }}" />
            <x-jet-input id="country" type="number" class="mt-1 block w-full" wire:model="product.country" />
            <x-jet-input-error for="product.country" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="spec_url" value="{{ __('Spec Url') }}" />
            <x-jet-input id="spec_url" type="number" class="mt-1 block w-full" wire:model="product.spec_url" />
            <x-jet-input-error for="product.spec_url" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Create Success!') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>




