<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold dark:text-gray-200 leading-tight">
            Edit Role: {{ ucfirst($role->name) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow dark:text-gray-100">

                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf @method('PUT')

                    {{-- Role Name --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Role Name</label>
                        <input type="text" name="name"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100"
                            value="{{ $role->name }}" required>
                    </div>

                    {{-- Role Description --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Description</label>
                        <textarea
                            name="description"
                            rows="3"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100"
                            placeholder="Describe this role..."
                        >{{ old('description', $role->description) }}</textarea>
                    </div>

                    {{-- Permissions --}}
                    <div class="mb-4">
                        <h3 class="font-semibold mb-2">Permissions</h3>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($permissions as $permission)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        @if($role->permissions->contains($permission)) checked @endif
                                        class="rounded dark:bg-gray-700"
                                    >
                                    <span>{{ $permission->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('roles.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Cancel
                        </a>

                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
