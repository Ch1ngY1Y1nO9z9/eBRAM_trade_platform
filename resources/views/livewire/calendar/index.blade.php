<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-wrap py-5 flex-col md:flex-row items-center">
            <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="text-xl">{{ $dateRange }}</span>
            </div>
            <nav
                class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
                <a href="/scheduler/new" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">New event</a>
            </nav>
        </div>
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <table class="min-w-full divide-y divide-gray-200 w-full text-center">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Organizer
                                </th>
                                <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Subject
                                </th>
                                <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Start
                                </th>
                                <th scope="col" class="py-3 bg-gray-50 font-medium text-gray-500">
                                    End
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-500">
                            @isset($events)
                                @foreach ($events as $event)
                                    <tr class="py-2">
                                        {{-- <td class="text-center"><input type="checkbox"></td> --}}
                                        <td>{{ $event->getOrganizer()->getEmailAddress()->getName() }}</td>
                                        <td>{{ $event->getSubject() }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->getStart()->getDateTime())->format('n/j/y g:i A') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($event->getEnd()->getDateTime())->format('n/j/y g:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
