<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('RFQ Detail') }}
    </x-slot>

    <x-slot name="description">
        {{ __('bulid your own RFQ for business.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="product_type" value="{{ __('*Product Type') }}" />
            <x-jet-input id="product_type" type="text" class="mt-1 block w-full" wire:model="rfq.product_type" />
            <x-jet-input-error for="rfq.product_type" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="product_name" value="{{ __('*Product Name') }}" />
            <x-jet-input id="product_name" type="text" class="mt-1 block w-full" wire:model="rfq.product_name" />
            <x-jet-input-error for="rfq.product_name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="product_number" value="{{ __('*Require Number') }}" />
            <x-jet-input id="product_number" type="number" class="mt-1 block w-full" wire:model="rfq.product_number" />
            <x-jet-input-error for="rfq.product_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="unit" value="{{ __('*Unit') }}" />
            <x-jet-input id="unit" type="text" class="mt-1 block w-full" wire:model="rfq.unit" />
            <x-jet-input-error for="rfq.unit" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="detail" value="{{ __('*Detail') }}" />
            <textarea wire:model="rfq.detail"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                id="detail" cols="30" rows="10"></textarea>
            <x-jet-input-error for="rfq.detail" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            @if (is_string($photo))
                Photo Preview:
                <img src="{{ $photo }}">
            @elseif($photo)
                Photo Preview:
                <img src="{{ $photo->temporaryUrl() }}">
            @endif
            <x-jet-label for="photo" value="{{ __('*Upload Image') }}" />
            <x-jet-input id="photo" type="file" class="mt-1 block w-full" wire:model="photo" />
            <x-jet-input-error for="rfq.product_image" class="mt-2" />
        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled">
            {{ __('Store') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>

@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('swal:success', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Store Success!',
                icon: 'success',
            })
        });
    </script>
@endpush
