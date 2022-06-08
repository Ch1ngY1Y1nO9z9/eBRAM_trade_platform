<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notification') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    @if (count($list))
                        <table class="min-w-full divide-y divide-gray-200 w-full text-center">
                            <thead class="bg-gray-100 ">
                                <tr>
                                    {{-- <th nowrap="nowrap" scope="col" width="50"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    選取
                                </th> --}}
                                    <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                        Inquiry send by
                                    </th>
                                    <th wire:click="sortBy('type')" scope="col"
                                        class="py-3 bg-gray-50 font-medium text-gray-500">
                                        Inquiry Product
                                    </th>
                                    <th wire:click="sortBy('product_name_en')" scope="col"
                                        class="py-3 bg-gray-50 font-medium text-gray-500">
                                        Number
                                    </th>
                                    <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                        Inquiry Detail
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
                                @foreach ($list as $item)
                                    <tr class="py-2">
                                        {{-- <td class="text-center"><input type="checkbox"></td> --}}
                                        @if (auth()->user()->role == 'buyer')
                                            <td>
                                                {{ auth()->user()->findUser($item->seller_id)->name }}
                                                @if ($item->status == 'unread')
                                                    (New!)
                                                @endif
                                            </td>
                                        @elseif(auth()->user()->role == 'seller')
                                            <td>
                                                {{ auth()->user()->findUser($item->buyer_id)->name }}
                                                @if ($item->status == 'unread')
                                                    (New!)
                                                @endif
                                            </td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ $item->produc_name }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->msg }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="flex justify-center">
                                                <a href="/notification/detail/{{ $item->id }}"
                                                    class="bg-green-700 hover:bg-green-500 text-white font-bold py-2 px-4 rounded mr-3">Detail</a>
                                                @if ($item->rfq_id)
                                                    <a class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-3"
                                                        href="/teams/create?with={{ App\Models\User::find($item->seller_id)->name }}">Accept</a>
                                                @elseif($item->product_id)
                                                    <a class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-3"
                                                        href="/teams/create?with={{ App\Models\User::find($item->buyer_id)->name }}">Accept</a>
                                                @endif
                                                <button
                                                    class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded"
                                                    wire:click="$emit('inq:delete',{{ $item->id }})">cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="h-[50vh] text-center text-4xl text-gray-400">
                            <h2 class="pt-3">No Result</h2>
                        </div>
                    @endif
                    {{ $list->links() }}
                </div>
            </div>
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
