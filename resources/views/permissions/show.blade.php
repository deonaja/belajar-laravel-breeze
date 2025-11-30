<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold dark:text-gray-200 leading-tight">
            {{ __('Permission Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg dark:text-gray-100">

                <p><strong>Name:</strong> {{ $permission->name }}</p>

                <div class="flex gap-2 mt-4">
                    <a href="{{ route('permissions.edit', $permission->id) }}"
                        class="px-3 py-1 bg-amber-600/40 text-amber-200 rounded hover:bg-yellow-600 text-sm">
                        Edit
                    </a>
                    <a href="{{ route('permissions.index') }}"
                        class="px-3 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
