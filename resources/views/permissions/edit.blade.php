<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold dark:text-gray-200 leading-tight">
            Edit Permission: {{ $permission->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow dark:text-gray-100">

                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf @method('PUT')

                    {{-- Permission Name --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Permission Name</label>
                        <input type="text" name="name" class="w-full rounded dark:bg-gray-700"
                               value="{{ $permission->name }}" required>
                    </div>

                    {{-- Permission Description --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-semibold">Description</label>
                        <textarea name="description" rows="3"
                            class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100"
                            placeholder="Describe this permission..."
                        >{{ old('description', $permission->description) }}</textarea>
                    </div>

                    {{-- Attach to roles --}}
                    <div>
                        <label class="font-semibold mb-2 block">Assign to Roles</label>
                        <div class="space-y-2">
                            @foreach ($roles as $role)

                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="roles[]"
                                        value="{{ $role->name }}"
                                        @if($permission->roles->contains($role)) checked @endif
                                        class="rounded dark:bg-gray-700">
                                    <span>{{ ucfirst($role->name) }}</span>
                                </label>

                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('permissions.index') }}"
                            class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Cancel</a>
                        <button
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
