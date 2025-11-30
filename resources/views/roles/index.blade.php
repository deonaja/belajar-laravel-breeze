<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Roles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($roles->count() === 0)
                <div class="bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 p-4 rounded-lg">
                    Tidak ada role ditemukan.
                    <a href="{{ route('roles.create') }}" class="underline">Buat role pertama</a>.
                </div>
            @else
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4 mr-4">
                        <h3 class="text-lg font-semibold">All Roles</h3>
                        <a href="{{ route('roles.create') }}"
                           class="px-4 py-2 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-sm">
                           Create New Role
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="border-b dark:border-gray-700">
                                <tr>
                                    <th class="py-2 px-3 font-semibold">ID</th>
                                    <th class="py-2 px-3 font-semibold">Nama</th>
                                    <th class="py-2 px-3 font-semibold">Deskripsi</th>
                                    <th class="py-2 px-3 font-semibold">Permissions</th>
                                    <th class="py-2 px-3 font-semibold">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($roles as $role)
                                <tr>
                                    <td class="py-2 px-3">{{ $role->id }}</td>
                                    <td class="py-2 px-3 font-semibold">{{ $role->name }}</td>
                                    <td class="py-2 px-3">{{ $role->description ?? '-' }}</td>
                                    <td class="py-2 px-3 text-center">{{ $role->permissions->count() }}</td>

                                    <td class="py-2 px-3 flex gap-2">
                                        <a href="{{ route('roles.show', $role->id) }}"
                                            class="px-3 py-1 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-sm">
                                            View
                                        </a>

                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="px-3 py-1 bg-amber-600/40 text-amber-200 rounded hover:bg-yellow-600 text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="px-3 py-1 bg-red-700/40 text-red-200 rounded hover:bg-red-700 text-sm"
                                                onclick="return confirm('Yakin ingin menghapus role ini?')">
                                                Delete
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

            @endif
        </div>
    </div>
</x-app-layout>
