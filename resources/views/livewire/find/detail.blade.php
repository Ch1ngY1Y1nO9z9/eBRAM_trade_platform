<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a href="/find_product" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="text-xl">
                    < Back</span>
            </a>
        </div>

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                @if ($item->photo1)
                    <img class="object-cover object-center rounded" alt="{{$item->product_name_en}}" src="{{ Storage::url($item->photo1) }}">
                @else
                    <div class="bg-gray-500 h-full w-full"></div>
                @endif
            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                    {{ $item->type }} -
                    <br class="hidden lg:inline-block">
                    {{ $item->product_name_en }}
                </h1>
                <p class="mb-8 leading-relaxed">
                    {{ $item->detail_en }}
                </p>
                @if ($allowSentInquiry)
                    <div class="flex justify-center">
                        <button wire:click="openModal()"
                            class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            Inquire Now
                        </button>
                    </div>
                @else
                    <div class="flex justify-center">
                        <div
                            class="inline-flex text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none rounded text-lg cursor-not-allowed">
                            You have been send inquire, please wait
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if ($isOpen && $allowSentInquiry)
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl md:max-w-4xl sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <form>
                        <div class="bg-gray-50 py-3 px-4 ">
                            <span class="w-full sm:w-auto">
                                Send Inquiry
                            </span>
                        </div>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="mb-4 flex">
                                <label for="exampleFormControlInput1"
                                    class="text-gray-700 text-sm font-bold">Number:</label>
                                <input type="number" min="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline ml-3"
                                    id="exampleFormControlInput1" placeholder="e.g. 1000" wire:model="inquiry.number">

                                @error('number')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="exampleFormControlInput2"
                                    class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-[250px]"
                                    id="exampleFormControlInput2" wire:model="inquiry.msg"
                                    placeholder="Enter product details such as color, size, materials and other specific requirments."></textarea>

                                @error('body')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click.prevent="store()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Send Inquiry Now
                                </button>
                            </span>

                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button wire:click="closeModal()" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Cancel
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>


@push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('swal:success', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Inquiry has been send!',
                icon: 'success',
            })
        });
    </script>
@endpush
