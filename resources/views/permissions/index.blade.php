<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 leading-tight">
            {{ __('Manage Permissions') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-gray-100">

                    <div class="flex justify-between mb-4 mr-4">
                        <h3 class="text-lg font-semibold">All Permissions</h3>
                        <a href="{{ route('permissions.create') }}"
                            class="px-4 py-2 bg-blue-700/40 text-blue-200 hover:bg-blue-700 rounded text-sm">
                            Create New
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="border-b dark:border-gray-700">
                                <tr>
                                    <th class="py-2 px-3">ID</th>
                                    <th class="py-2 px-3">Name</th>
                                    <th class="py-2 px-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class=" divide-y dark:divide-gray-700 ">
                                @foreach($permissions as $per)
                                <tr>
                                    <td class="py-2 px-3">{{ $per->id }}</td>
                                    <td class="py-2 px-3 ">{{ $per->name }}</td>
                                    <td class="py-2 px-3 flex gap-2">
                                        <a href="{{ route('permissions.show', $per->id) }}"
                                            class="px-3 py-1 bg-blue-700/40 text-blue-200 hover:bg-blue-700 rounded text-sm">
                                            Lihat
                                        </a>
                                        <a href="{{ route('permissions.edit', $per->id) }}"
                                            class="px-3 py-1 bg-amber-600/40 text-amber-200 hover:bg-yellow-600 rounded text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('permissions.destroy', $per->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button 
                                                onclick="return confirm('Delete permission?')"
                                                class="px-3 py-1 bg-red-700/40 text-red-200 hover:bg-red-700 rounded text-sm">
                                                Hapus
                                            </button>
                                        </form>
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
</x-app-layout>
