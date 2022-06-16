<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="mx-auto py-10 sm:px-6 lg:px-8">

        @livewire('profile.update-profile-information-form')

        <x-jet-section-border />

        {{-- @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
                @livewire('profile.update-password-form')
            </div>
        @endif --}}

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

    @push('script')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('saved', () => {
                Swal.fire({
                    title: 'Success!',
                    text: 'Update Success!',
                    icon: 'success',
                }).then(()=>{
                    location.reload();
                })
            });
        </script>
    @endpush

</x-app-layout>
