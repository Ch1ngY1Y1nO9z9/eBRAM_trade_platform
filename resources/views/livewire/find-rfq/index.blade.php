<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Find RFQ') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="text-xl">Search RFQ</span>
            </a>
            <div class="ml-3">
                <input type="text" wire:model="search">
                <button wire:click.prevent="$refresh()" type="button"
                    class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5 ml-3" wire:loading.attr="disabled" >
                    Sreach
                </button>
            </div>
        </div>

        <div>
            <div class="flex flex-wrap -m-4" wire:model="rfq_list">
                @if (isset($rfq_list))
                    @foreach ($rfq_list as $item)
                        <div wire:key='rfq-{{ $item->id }}' class="p-4 md:w-1/3">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                                    src="{{ Storage::url($item->product_image) }}" alt="{{ $item->product_name }}">
                                <div class="p-6">
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                        CATEGORY</h2>
                                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">
                                        {{ $item->product_type }}
                                    </h1>
                                    <p class="leading-relaxed mb-3">{{ $item->detail }}</p>
                                    <div class="flex items-center flex-wrap">
                                        <a href="/find_rfq/detail/{{ $item->id }}"
                                            class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0 cursor-pointer">Check
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $rfq_list->links() }}
                @else
                @endif
            </div>
        </div>
    </div>
</div>
