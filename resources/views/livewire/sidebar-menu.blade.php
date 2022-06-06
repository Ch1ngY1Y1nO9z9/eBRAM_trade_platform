<nav aria-label="alternative nav">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 md:relative md:h-screen z-10 w-full md:w-56 content-center">

        <div
            class="md:mt-24 md:w-56 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                <li class="mr-3 flex-1">
                    <a href="{{ route('index') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                    </a>
                </li>

                @if (Auth()->user()->role === 'buyer')
                    <li class="mr-3 flex-1">
                        <a href="{{ route('creareRFQ') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Create
                                RFQ</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{ route('findProduct') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Find
                                Products</span>
                        </a>
                    </li>
                @endif

                @if (Auth()->user()->role === 'seller')
                    <li class="mr-3 flex-1">
                        <a href="{{ route('createProduct') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Create
                                Products</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="{{ route('findRFQ') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Find
                                RFQ</span>
                        </a>
                    </li>
                @endif

                @if (Auth()->user()->role === 'lawyer')
                    <li class="mr-3 flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Create
                                Case
                            </span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Case
                                Management</span>
                        </a>
                    </li>
                @endif

                <li class="mr-3 flex-1">
                    <a href="#"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Activity
                            Scheduler</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="{{ route('notification') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Notification</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="/user/profile"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">User
                            profile</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <a href="#"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                        <span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Document
                            Management</span>
                    </a>
                </li>
                <li class="mr-3 flex-1">
                    <div
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-gray-800 hover:border-pink-500 border-r-4 border-indigo-500 relative group">
                        Group Management
                        <ul
                            class="hidden absolute py-3 bg-gray-800 text-black w-full top-[100%] left-0  group-hover:block text-xs md:text-base text-gray-400 md:text-gray-200">
                            <li class="pl-3 mr-3 flex-1">
                                <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                    {{ __('Group Settings') }}
                                </a>
                            </li>
                            {{-- <li class="pl-3 mr-3 flex-1">
                                <a href="{{ route('teams.create') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                    {{ __('Create New Group') }}
                                </a>
                            </li> --}}
                            <li class="pl-3 mr-3 flex-1">
                                <div
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white">
                                    {{ __('Group List') }}
                                </div>
                            </li>
                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</nav>
