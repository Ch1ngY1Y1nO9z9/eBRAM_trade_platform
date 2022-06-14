<x-jet-form-section submit="updateProfile">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('*Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.user.name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('*Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.user.email" />
            <x-jet-input-error for="email" class="mt-2" />


                <p class="text-sm mt-2 text-red-500">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 text-red-500"
                        wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email_2" value="{{ __('Backup Email') }}" />
                <x-jet-input id="email_2" type="email" class="mt-1 block w-full" wire:model.defer="state.user.email_2" />
                <x-jet-input-error for="email_2" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="jobtitle" value="{{ __('Job Title') }}" />
                <x-jet-input id="jobtitle" type="text" class="mt-1 block w-full" wire:model.defer="state.user.jobtitle" />
                <x-jet-input-error for="jobtitle" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone_1" value="{{ __('Phone') }}" />
                <div class="flex">
                    <select
                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10" wire:model.defer="state.user.country_code">
                        <option>+852</option>
                        <option>+886</option>
                    </select>
                    <x-jet-input id="phone_1" type="text" class="ml-3 block w-full" wire:model.defer="state.user.phone_1" />
                </div>
                <x-jet-input-error for="phone_1" class="mt-2" />
            </div>
        </x-slot>



        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
