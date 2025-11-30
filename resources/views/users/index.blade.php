<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 leading-tight">
            Manage Users
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
                <div class="p-6 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-4">All Users</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="border-b dark:border-gray-700">
                                <tr>
                                    <th class="py-2 px-3 font-semibold">Name</th>
                                    <th class="py-2 px-3 font-semibold">Email</th>
                                    <th class="py-2 px-3 font-semibold">Email Status</th>
                                    <th class="py-2 px-3 font-semibold">Role</th>
                                    <th class="py-2 px-3 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($users as $user)
                                <tr>
                                    <!-- Name -->
                                    <td class="py-2 px-3 font-semibold">
                                        {{ $user->name }}
                                    </td>

                                    <!-- Email -->
                                    <td class="py-2 px-3">
                                        {{ $user->email }}
                                    </td>

                                    <!-- Email Status -->
                                    <td class="py-2 px-3">
                                        @if($user->hasVerifiedEmail())
                                            <span class="px-2 py-1 text-xs bg-green-600/40 text-green-200 rounded">
                                                ✔ Verified
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-yellow-600/40 text-yellow-200 rounded">
                                                ✖ Pending
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Role(s) -->
                                    <td class="py-2 px-3">
                                        @forelse($user->roles as $role)
                                            <span class="px-2 py-1 text-xs bg-blue-600/40 text-blue-200 rounded">
                                                {{ $role->name }}
                                            </span>
                                        @empty
                                            <span class="px-2 py-1 text-xs bg-gray-500/40 text-gray-200 rounded">
                                                No Role
                                            </span>
                                        @endforelse
                                    </td>

                                    <!-- Actions -->
                                    <td class="py-2 px-3 flex gap-2">

                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="px-3 py-1 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-xs">
                                            Lihat
                                        </a>

                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="px-3 py-1 bg-amber-600/40 text-amber-200 rounded hover:bg-yellow-600 text-xs">
                                            Edit Role
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus user?')"
                                                class="px-3 py-1 bg-red-700/40 text-red-200 rounded hover:bg-red-700 text-xs">
                                                Hapus
                                            </button>
                                        </form>

                                        @if(!$user->hasVerifiedEmail())
                                        <form action="{{ route('users.verify', $user->id) }}" 
                                              method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button
                                                class="px-3 py-1 bg-green-600/40 text-green-200 rounded hover:bg-green-700 text-xs">
                                                Verify Email
                                            </button>
                                        </form>
                                        @endif

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
