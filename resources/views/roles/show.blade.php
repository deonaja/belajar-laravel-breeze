<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">
                
                <h3 class="text-lg font-semibold mb-4">Detail Role</h3>

                <p><strong>ID:</strong> {{ $role->id }}</p>
                <p><strong>Name:</strong> {{ $role->name }}</p>
                <p><strong>Description:</strong> {{ $role->description ?? '-' }}</p>
                <p><strong>Permissions:</strong> {{ $role->permissions->pluck('name')->join(', ') ?: '-' }}</p>

                <div class="flex gap-2 mt-4">
                    <a href="{{ route('roles.edit', $role->id) }}"
                       class="px-4 py-2 rounded bg-amber-600/40 text-amber-200 hover:bg-yellow-600 text-sm">
                       Edit
                    </a>

                    <a href="{{ route('roles.index') }}"
                       class="px-4 py-2 rounded bg-gray-600 text-white hover:bg-gray-700 text-sm">
                       Back
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
