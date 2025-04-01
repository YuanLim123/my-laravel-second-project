<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <x-table.table :headers="['Title', 'Content', 'Author', 'Last Updated', 'Action']">
                        @foreach ($articles as $article)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $article->title }}
                                </th>
                                <x-table.td>{{ $article->content }}</x-table.td>
                                <x-table.td>{{ $article->user->name }}</x-table.td>
                                <x-table.td>{{ $article->updated_at->format('Y-m-d')  }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ route('article.show', $article->id) }}" 
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Detail
                                    </a>
                                </x-table.td>
                            </tr>
                        @endforeach
                    </x-table.table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>