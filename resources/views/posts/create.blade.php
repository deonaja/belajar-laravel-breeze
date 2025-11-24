<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Create New Post
            </h2>

            <a href="{{ route('dashboard') }}"
               class="px-3 py-2 bg-gray-700/40 text-gray-200 rounded hover:bg-gray-700/60 transition">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>


    {{-- Container --}}
    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Card --}}
            <div class="bg-gray-800/60 shadow-lg rounded-xl p-8 border border-gray-700/40">

                {{-- Form --}}
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-6">
                        <label for="title" class="block text-gray-300 mb-2">Title</label>

                        <input 
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-200 border border-gray-600
                                   focus:border-blue-400 focus:ring focus:ring-blue-300/30"
                            required
                        >

                        @error('title')
                            <p class="text-red-300 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="mb-6">
                        <label for="content" class="block text-gray-300 mb-2">Content</label>

                        <textarea
                            name="content"
                            id="content"
                            rows="5"
                            class="w-full px-4 py-2 rounded-lg bg-gray-700 text-gray-200 border border-gray-600
                                   focus:border-blue-400 focus:ring focus:ring-blue-300/30"
                            required>{{ old('content') }}</textarea>

                        @error('content')
                            <p class="text-red-300 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Create Button --}}
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-5 py-2 bg-blue-700/40 text-blue-200 rounded hover:bg-blue-700/60 transition">
                            Create Post
                        </button>
                    </div>
                </form>

                {{-- Back button --}}
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}"
                        class="text-gray-300 hover:text-gray-100 underline">
                        ← Back to Posts
                    </a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
