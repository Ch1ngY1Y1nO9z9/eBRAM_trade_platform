<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <img src="https://fakeimg.pl/285x80" alt="">
                </a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">

            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('lang')" class="drop-button text-white py-2 px-2"> <span
                                    class="pr-2"><i class="em em-earth_asia" aria-role="presentation"
                                        aria-label="EARTH GLOBE ASIA-AUSTRALIA"></i></span> English <svg
                                    class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg></button>
                            <div id="lang"
                                class="dropdownlist absolute bg-gray-500 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <a href="#"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">English</a>
                                <a href="#"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block">中文</a>
                            </div>
                        </div>
                    </li>
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('userMenu')" class="drop-button text-white py-2 px-2"> <span
                                    class="pr-2"><i class="em em-robot_face"></i></span> Hi, {{Auth::user()->name}} <svg
                                    class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg></button>
                            <div id="userMenu"
                                class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <a href={{ route('profile.show') }}
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                        class="fa fa-user fa-fw"></i> Profile</a>
                                {{-- <a href="#"
                                    class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                        class="fa fa-cog fa-fw"></i> Settings</a> --}}
                                <div class="border border-gray-800"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                        class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                            class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>
