<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Management') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8">

        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <a href="#"
                class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                Back
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <x-jet-form-section submit="translateFile">
            <x-slot name="title">
                {{ __('File Translate') }}
            </x-slot>

            <x-slot name="description">
                {{ __('translate file to other language.') }}
            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="file" value="{{ __('Upload File') }}" />
                    <x-jet-input id="file" type="file" class="mt-1 block w-full" wire:model.defer="file" accept=".docx,.txt" />
                    <x-jet-input-error for="file" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="fromLang" value="{{ __('From') }}" />
                    <select
                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 w-full mt-1"
                        wire:model.defer="fromLang">
                        <option hidden value="-">
                            -
                        </option>
                        <option value="en">
                            English
                        </option>
                        <option value="zh-CHT">
                            Tranditional Chinese
                        </option>
                        <option value="zh-CHS">
                            Simplified Chinese
                        </option>
                        <option value="es">
                            Spanish
                        </option>
                        <option value="it">
                            Italian
                        </option>
                    </select>
                    <x-jet-input-error for="fromLang" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="toLang" value="{{ __('To') }}" />
                    <select
                        class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10 w-full mt-1"
                        wire:model.defer="toLang">
                        <option hidden value="-">
                            -
                        </option>
                        <option value="en">
                            English
                        </option>
                        <option value="zh-CHT">
                            Tranditional Chinese
                        </option>
                        <option value="zh-CHS">
                            Simplified Chinese
                        </option>
                        <option value="es">
                            Spanish
                        </option>
                        <option value="it">
                            Italian
                        </option>
                    </select>
                    <x-jet-input-error for="toLang" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="translateText" value="{{ __('Result') }}" />
                    <x-jet-input id="translateText" type="text" class="mt-1 block w-full bg-gray-300" wire:model.defer="translateText" readonly />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    {{ __('Transform') }}
                </x-jet-button>
            </x-slot>

        </x-jet-form-section>
    </div>
