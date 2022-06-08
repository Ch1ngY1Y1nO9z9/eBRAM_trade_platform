<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Case Management') }}
        </h2>
    </x-slot>
    <div class="flex flex-col x-auto py-10 sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <table class="min-w-full divide-y divide-gray-200 w-full text-center">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Group Name
                                </th>
                                <th scope="col"
                                    class="py-3 bg-gray-50 font-medium text-gray-500">
                                    Created_at
                                </th>
                                <th scope="col" width="200" class="py-3 bg-gray-50">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-500">
                            @foreach (Auth::user()->allTeams() as $group)
                                <tr class="py-2">
                                    <td>
                                        <x-jet-switchable-team :team="$group" component="jet-responsive-nav-link" />
                                    </td>
                                    <td>{{ $group->created_at }}</td>
                                    <td>
                                        <div class="flex min-w-[150px] justify-center">
                                            @if ($group->id === Auth::user()->currentTeam->id)
                                                <a href="/case/management/edit/{{ $group->id }}"
                                                    class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-3">Edit</a>
                                            @else
                                                <div class="bg-gray-400 hover:cursor-not-allowed text-white font-bold py-2 px-4 rounded mr-3">Edit</div>
                                            @endif
                                            <button
                                                class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
