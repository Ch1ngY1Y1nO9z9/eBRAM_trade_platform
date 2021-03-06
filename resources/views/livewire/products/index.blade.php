<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8" x-data="{ open: true }">
        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="text-xl">Current Product</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
                <a href="javascript:void(0)" x-show="open" @click="open = !open"
                    class="mr-5 hover:text-gray-900">Create</a>
            </nav>
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                x-show="!open" @click="open = !open" wire:click="$emit('resetInput')">Back
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
        <div x-show="open" class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <table class="min-w-full divide-y divide-gray-200 w-full text-center">
                        <thead class="bg-gray-100 ">
                            <tr>
                                {{-- <th nowrap="nowrap" scope="col" width="50"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    選取
                                </th> --}}
                                <th wire:click="sortBy('type')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Type
                                </th>
                                <th wire:click="sortBy('product_name_en')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Product Name
                                </th>
                                <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Photo
                                </th>
                                <th scope="col" wire:click="sortBy('unit_price')" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Unit Price
                                </th>
                                <th wire:click="sortBy('detail_en')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Detail
                                </th>
                                <th wire:click="sortBy('created_at')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Created_at
                                </th>
                                <th scope="col" width="200" class="py-3 bg-gray-50">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-500">
                            @foreach ($products as $item)
                                <tr class="py-2">
                                    {{-- <td class="text-center"><input type="checkbox"></td> --}}
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->product_name_en }}</td>
                                    <td>
                                        @if ($item->photo1)
                                            <img class="max-h-[200px] mx-auto"
                                                src="{{ Storage::url($item->photo1) }}"
                                                alt="{{ $item->product_name_en }}">
                                        @else
                                            <div></div>
                                        @endif
                                    </td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->detail_en }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="flex min-w-[150px] justify-center">
                                            <button
                                                class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-3"
                                                wire:click="$emit('pd:edit',{{ $item->id }})"
                                                @click="open = !open">Check</button>
                                            <button
                                                class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded"
                                                wire:click="$emit('pd:confirm',{{ $item->id }})">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $products->links() }} --}}
                </div>
            </div>
        </div>
        <div x-show="!open">
            @livewire('products.create-product-form')
        </div>
    </div>
</div>

@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('pd:confirm', $id => {
            Swal.fire({
                title: 'Are you sure delete the Product?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('pd:delete', $id)
                } else if (result.isDenied) {

                }
            })
        });

        Livewire.on('pd:delete_success', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Delete Success!',
                icon: 'success',
            })
        });
    </script>
@endpush

