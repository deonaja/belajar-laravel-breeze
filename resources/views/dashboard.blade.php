<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Jika tidak ada post --}}
            @if($posts->count() === 0)
                <div class="bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 p-4 rounded-lg">
                    Tidak ada post ditemukan.
                    <a href="{{ route('posts.create') }}" class="underline">Buat post pertama</a>.
                </div>
            @else
            {{-- Card Box --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4 mr-4">
                        <h3 class="text-lg font-semibold">All Posts</h3>
                        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-sm">Create New Post</a> 
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left">
                            <thead class="border-b dark:border-gray-700">
                                <tr>
                                    <th class="py-2 px-3 font-semibold">ID</th>
                                    <th class="py-2 px-3 font-semibold">Title</th>
                                    <th class="py-2 px-3 font-semibold">Content</th>
                                    <th class="py-2 px-3 font-semibold">Created At</th>
                                    <th class="py-2 px-3 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                                @foreach($posts as $post)
                                <tr>
                                    <td class="py-2 px-3">{{ $post->id }}</td>
                                    <td class="py-2 px-3 font-semibold">{{ $post->title }}</td>
                                    <td class="py-2 px-3">
                                        {{ \Illuminate\Support\Str::limit($post->content, 40) }}
                                    </td>
                                    <td class="py-2 px-3">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </td>
                                    
                                    <td class="py-2 px-3 flex gap-2">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                            class="px-3 py-1 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700 text-sm">View</a> 
                                        @role('admin')
                                            <a href="{{ route('posts.edit', $post->id) }}" 
                                                class="px-3 py-1 bg-amber-600/40 text-amber-200 rounded hover:bg-yellow-600 text-sm">Edit</a> 
                                        @endrole
                                        @role('admin|writer')
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="px-3 py-1 bg-red-700/40 text-red-200 rounded hover:bg-red-700 text-sm"
                                                onclick="return confirm('Yakin ingin menghapus post ini?')">
                                                Delete
                                            </button>
                                        </form>
                                        @endrole
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
