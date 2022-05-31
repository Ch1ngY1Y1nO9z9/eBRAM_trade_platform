<div class="flex flex-wrap -m-4">
    @foreach ($products as $item)
        <div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400"
                    alt="blog">
                <div class="p-6">
                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$item->type}}</h1>
                    <p class="leading-relaxed mb-3">{{$item->detail_en}}</p>
                    <div class="flex items-center flex-wrap">
                        <a href="/product/edit/{{$item->id}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0 cursor-pointer">Edit
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <span
                            class="text-red-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm py-1 cursor-pointer" wire:click.prevent="deleteProduct({{$item->id}})"> <i class="fa fa-trash" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
