@props(['article'])
<x-panel class="flex gap-x-6">
    {{-- <x-employer-logo :employer="$job->employer" /> --}}
    <div class="flex-1 flex flex-col ">
        <a class="self-start text-sm text-gray-400" href="#">{{  $article->title }}</a>
        {{-- <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transaction-colors duration-300">
            <a href="/jobs/{{ $job->id }}">
                {{  $job->title }}
            </a>
        </h3> --}}
        <p class="text-sm text-gray-400 mt-auto">{{  $article->content }}</p>
    </div>
    <div>
        {{-- @foreach ($job->tags as $tag)
            <x-tag :tag="$tag"></x-tag>
        @endforeach --}}
    </div>
</x-panel>