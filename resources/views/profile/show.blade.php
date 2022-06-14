<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @if (!auth()->user()->msgraph_login)
        <div class="bg-red-500 text-white text-lg py-5 flex justify-center">
            Please sign in your microsoft account
            <a href="/signin" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition ml-3">Click here to sign in</a>
        </div>
    @endif
    <div class="mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('profile.update-profile-information-form')

        <x-jet-section-border />

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>
        @endif

        <x-jet-section-border />

        @livewire('update-account-form')

        <x-jet-section-border />
        @livewire('update-profile-localization-form')

    </div>

    @if (Session::has('verify_msg'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire("{{ Session::get('verify_msg') }}")
        </script>
    @endif

</x-app-layout>
