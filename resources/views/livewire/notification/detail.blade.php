<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inquiry Detail') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a href="/notification"
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Back
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <x-jet-form-section submit="store">
            <x-slot name="title">
                {{ __('Inquiry Detail') }}
            </x-slot>

            <x-slot name="description">
                {{ __('check inquiry detail for the business') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="product_type" value="{{ __('*Product Type') }}" />
                    <x-jet-input id="product_type" type="text" class="mt-1 block w-full"
                        wire:model="inquiry.product_type" readonly />
                    <x-jet-input-error for="inquiry.product_type" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="product_name" value="{{ __('*Product Name') }}" />
                    <x-jet-input id="product_name" type="text" class="mt-1 block w-full"
                        wire:model="inquiry.product_name" readonly />
                    <x-jet-input-error for="inquiry.product_name" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="product_number" value="{{ __('*Require Number') }}" />
                    <x-jet-input id="product_number" type="number" class="mt-1 block w-full"
                        wire:model="inquiry.product_number" readonly />
                    <x-jet-input-error for="inquiry.product_number" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="unit" value="{{ __('*Unit') }}" />
                    <x-jet-input id="unit" type="text" class="mt-1 block w-full" wire:model="inquiry.unit" readonly />
                    <x-jet-input-error for="inquiry.unit" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="msg" value="{{ __('*Detail') }}" />
                    <textarea wire:model="inquiry.msg"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        id="msg" cols="30" rows="10" readonly>
                        {{$inquiry->msg}}
                    </textarea>
                    <x-jet-input-error for="inquiry.msg" class="mt-2" />
                </div>

            </x-slot>

        </x-jet-form-section>
    </div>
</div>
