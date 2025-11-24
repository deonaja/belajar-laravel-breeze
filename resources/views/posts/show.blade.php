<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            View Post
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg text-gray-200">

            <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>

            <p class="mb-6">
                {{ $post->content }}
            </p>

            <a href="{{ route('dashboard') }}" 
               class="text-blue-300 hover:text-blue-400 underline">
               ← Back to Posts
            </a>

        </div>
    </div>
</x-app-layout>
