@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($articles as $article)
        <div class="bg-black rounded-lg shadow-md p-4" style="background-color: black;">
            @if ($article->img_src)
                <img src="{{ $article->img_src }}" alt="{{ $article->heading }}" class="w-full h-48 object-cover rounded-t-lg">
            @else
                <div class="bg-gray-200 h-48 rounded-t-lg flex items-center justify-center">
                    <span class="text-white">No Image</span>
                </div>
            @endif
            <h5 class="text-lg font-semibold mt-2">
                <a href="{{ route('user.articles.show', ['article' => $article->id]) }}" class="text-white hover:text-green-500 hover:underline">
                    {{ $article->heading }}
                </a>
            </h5>
            <p class="text-white">{{ $article->subheading }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection