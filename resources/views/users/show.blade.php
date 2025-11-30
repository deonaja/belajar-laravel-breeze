<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->roles->pluck('name')->join(', ') ?: '-' }}</p>

                <div class="flex gap-2 mt-4">
                    <a href="{{ route('users.edit', $user->id) }}"
                       class="px-3 py-1 rounded bg-amber-600/40 text-amber-200 hover:bg-yellow-600 text-sm">
                       Edit Role
                    </a>
                    <a href="{{ route('users.index') }}"
                       class="px-3 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">
                       Back
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
