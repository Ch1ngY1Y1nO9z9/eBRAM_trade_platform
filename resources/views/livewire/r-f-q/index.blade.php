<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create RFQ') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8" x-data="{ open: true }">
        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="text-xl">Current RFQ</span>
            </a>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
                <a href="javascript:void(0)" x-show="open" @click="open = !open"
                    class="mr-5 hover:text-gray-900">Create</a>
            </nav>
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                x-show="!open" @click="open = !open">Back
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
                                    Product Image
                                </th>
                                <th wire:click="sortBy('product_number')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Require Number
                                </th>
                                <th wire:click="sortBy('detail')" scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    RFQ Detail
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
                            @foreach ($rfq_list as $item)
                                <tr class="py-2">
                                    {{-- <td class="text-center"><input type="checkbox"></td> --}}
                                    <td>{{ $item->product_type }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        <img class="max-h-[200px] mx-auto" src="{{ Storage::url($item->product_image) }}" alt="{{$item->product_name}}">
                                    </td>
                                    <td>{{ $item->product_number . $item->unit }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        <div class="flex min-w-[150px] justify-center">
                                            <a class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-3"
                                                href="/RFQ/detail/1">詳細</a>
                                            <button
                                                class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded"
                                                wire:click="$emit('rfq:confirm',{{ $item->id }})">取消</button>
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
            @livewire('r-f-q.create-rfq-form')
        </div>
    </div>
</div>

@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('rfq:confirm', $id => {
            Swal.fire({
                title: 'Are you sure delete the RFQ?',
                showDenyButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `No`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('rfq:delete', $id)
                } else if (result.isDenied) {

                }
            })
        });

        Livewire.on('rfq:delete_success', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Delete Success!',
                icon: 'success',
            })
        });
    </script>
@endpush
