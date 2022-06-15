<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="font-bold" for="name" value="{{ __('*Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full bg-gray-300" wire:model.defer="state.email" disabled />
            <x-jet-input-error for="email" class="mt-2" />

            @unless($this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 text-red-500">
                    {{ __('Your email address is unverified. Please check your email to verify your email') }}
                    <br/>
                    didn't get verify email?
                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900"
                        wire:click.prevent="sendEmailVerification">
                        {{ __("Click here") }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
                @endif
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email_2" value="{{ __('Backup Email') }}" />
                <x-jet-input id="email_2" type="email" class="mt-1 block w-full" wire:model.defer="state.email_2" />
                <x-jet-input-error for="email_2" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="jobtitle" value="{{ __('Job Title') }}" />
                <x-jet-input id="jobtitle" type="text" class="mt-1 block w-full" wire:model.defer="state.jobtitle"
                    autocomplete="jobtitle" />
                <x-jet-input-error for="jobtitle" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="phone_1" value="{{ __('Phone') }}" />
                <div class="flex">
                    <select
                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10" wire:model.defer="state.country_code">
                        <option value="852">+852</option>
                        <option value="886">+886</option>
                    </select>
                    <x-jet-input id="phone_1" type="text" class="ml-3 block w-full" wire:model.defer="state.phone_1" />
                </div>
                <x-jet-input-error for="phone_1" class="mt-2" />
            </div>
        </x-slot>



        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
