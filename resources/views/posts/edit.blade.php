<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mb-2 text-gray-200">Title</label>
                <input type="text" name="title" class="w-full p-2 rounded bg-gray-700 text-gray-200"
                       value="{{ $post->title }}">

                <label class="block mt-4 mb-2 text-gray-200">Content</label>
                <textarea name="content" class="w-full p-2 rounded bg-gray-700 text-gray-200">
                    {{ $post->content }}
                </textarea>

                <div class="flex justify-end items-center">
                    <button class="mt-4 mr-4 px-4 py-2 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700/60">
                        Cancel
                    </button>
                    <button class="mt-4 px-4 py-2 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700/60">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
