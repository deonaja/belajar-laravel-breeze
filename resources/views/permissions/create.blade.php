<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold dark:text-gray-200 leading-tight">
            {{ __('Create Permission') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg dark:text-gray-100">

                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf

                    <label class="mb-1 font-semibold">Permission Name</label>
                    <input type="text" name="name" required
                        class="w-full mt-1 mb-4 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">

                    <div class="flex justify-between">
                        <a href="{{ route('permissions.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancel
                        </a>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
