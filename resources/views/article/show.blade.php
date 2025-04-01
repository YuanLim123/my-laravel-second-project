{{-- filepath: c:\laragon\www\project\resources\views\article\show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Detail') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                {{-- Action Buttons at Top-Right --}}
                <div class="absolute top-4 right-4 flex items-center gap-4">
                    {{-- Edit Button --}}
                    <a href="{{ route('article.edit', $article->id)}}" 
                       class="text-blue-600 hover:text-blue-800 font-medium">
                        Edit
                    </a>
    
                    {{-- Delete Button --}}
                    <form action="{{ route('article.destroy', $article->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="p-6 flex flex-col md:flex-row gap-6">
                    {{-- Article Image --}}
                    @if ($article->image)
                        <div class="flex-shrink-0">
                            <x-article-logo :article="$article" :width="200"/>
                            {{-- <img src="{{ asset('storage/' . $article->image) }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full md:w-64 h-auto rounded-lg shadow-md"> --}}
                        </div>
                    @endif

                    {{-- Article Content --}}
                    <div class="flex-grow">
                        {{-- Article Title --}}
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">
                            {{ $article->title }}
                        </h1>

                        {{-- Article Content --}}
                        <p class="text-gray-700 leading-relaxed mb-6">
                            {{ $article->content }}
                        </p>

                        {{-- Article Metadata --}}
                        <div class="text-sm text-gray-500">
                            <p>Author: <span class="font-medium">{{ $article->user->name }}</span></p>
                            <p>Last Updated: <span class="font-medium">{{ $article->updated_at->format('Y-m-d') }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>