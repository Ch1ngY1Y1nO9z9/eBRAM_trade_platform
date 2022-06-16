<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a href="/scheduler"
                class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                Back
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <x-jet-form-section submit="createNewEvent">
            <x-slot name="title">
                {{ __('New event') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Create a new group to collaborate with others on projects.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="subject" value="{{ __('*Subject') }}" />
                    <x-jet-input id="subject" type="text" class="mt-1 block w-full" wire:model.defer="eventSubject"
                        autofocus />
                    <x-jet-input-error for="subject" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="attendees" value="{{ __('*Attendees') }}" />
                    <x-jet-input id="attendees" type="text" class="mt-1 block w-full"
                        wire:model.defer="eventAttendees" />
                    <x-jet-input-error for="attendees" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="eventStart" value="{{ __('*Start') }}" />
                    <x-jet-input id="eventStart" type="datetime-local" class="mt-1 block w-full"
                        wire:model.defer="eventStart" />
                    <x-jet-input-error for="eventStart" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="eventEnd" value="{{ __('*End') }}" />
                    <x-jet-input id="eventEnd" type="datetime-local" class="mt-1 block w-full"
                        wire:model.defer="eventEnd" />
                    <x-jet-input-error for="eventEnd" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="eventMeeting" value="{{ __('Create an online meeting?') }}" />
                    <x-jet-checkbox wire:model.defer="eventMeeting" id="eventMeeting" />
                    <x-jet-input-error for="eventMeeting" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="eventBody" value="{{ __('Body') }}" />
                    <textarea wire:model.defer="eventBody"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        id="detail" cols="30" rows="10"></textarea>
                    <x-jet-input-error for="eventBody" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Create') }}
                </x-jet-button>

                <a class="btn btn-secondary ml-3" href="/calendar">Cancel</a>
            </x-slot>
        </x-jet-form-section>
    </div>
