@props(['article', 'width' => 90])
 
<img src="{{ asset('storage/'.$article->image) }}" alt="" class="rounded-xl shadow-md" width="{{ $width }}">
{{-- <img src="{{ asset('storage/' . $article->image) }}" 
    alt="{{ $article->title }}" 
    class="w-full md:w-64 h-auto rounded-lg shadow-md"> --}}