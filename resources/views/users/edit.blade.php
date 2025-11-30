<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User Role') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">User</label>
                        <input type="text" value="{{ $user->name }}" disabled
                            class="w-full rounded-lg dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Role</label>
                        <select name="role" class="w-full rounded-lg dark:bg-gray-700 dark:text-gray-100">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" 
                                        {{ $user->roles->first()?->name == $role->name ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('users.index') }}"
                           class="px-4 py-2 rounded bg-gray-600 text-white hover:bg-gray-700">
                           Cancel
                        </a>
                        <button class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                            Update Role
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
