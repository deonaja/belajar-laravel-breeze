<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($users->count() === 0)
                <div class="bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 p-4 rounded-lg">
                    Tidak ada user ditemukan.
                </div>
            @else

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-lg font-semibold mb-4">All Users</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="border-b dark:border-gray-700">
                                <tr>
                                    <th class="py-2 px-3 font-semibold">ID</th>
                                    <th class="py-2 px-3 font-semibold">Name</th>
                                    <th class="py-2 px-3 font-semibold">Email</th>
                                    <th class="py-2 px-3 font-semibold">Role</th>
                                    <th class="py-2 px-3 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($users as $user)
                                <tr>
                                    <td class="py-2 px-3">{{ $user->id }}</td>
                                    <td class="py-2 px-3 font-semibold">{{ $user->name }}</td>
                                    <td class="py-2 px-3">{{ $user->email }}</td>
                                    <td class="py-2 px-3">
                                        {{ $user->roles->pluck('name')->join(', ') ?: '-' }}
                                    </td>

                                    <td class="py-2 px-3 flex gap-2">
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="px-3 py-1 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-sm">
                                            Lihat
                                        </a>

                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="px-3 py-1 bg-amber-600/40 text-amber-200 rounded hover:bg-yellow-600 text-sm">
                                            Edit Role
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus user?')" 
                                                class="px-3 py-1 bg-red-700/40 text-red-200 rounded hover:bg-red-700 text-sm">
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

            @endif

        </div>
    </div>
</x-app-layout>
