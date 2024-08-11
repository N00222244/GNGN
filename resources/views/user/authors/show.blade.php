@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ($author->name) }} - ARTICLES
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg pt-6 mb-6" style="background-color: black;">
            <!-- Display author details -->
            <h3 class="font-bold text-2xl mb-4 text-white">AUTHOR DETAILS</h3>
            
            <p class="text-white">
                <span class="font-bold">NAME:</span> {{ ($author->name) }}
            </p>
            <p class="text-white">
                <span class="font-bold">BIO:</span> {{ ($author->bio) }}
            </p>
            
            <p class="text-white">
                <span class="font-bold">PHONE NUMBER:</span> {{ ($author->phone_no) }}
            </p>
            <p class="text-white">
                <span class="font-bold">EMAIL:</span> {{ ($author->email) }}
            </p>
            <p class="text-white">
                <span class="font-bold">IMG_SRC:</span> {{ ($author->img_src) }}
            </p>

            <!-- Display articles for the author -->
            <h3 class="font-bold text-2xl mt-6 mb-4 text-white">ARTICLES BY {{ ($author->name) }}</h3>
            @forelse ($articles as $article)
                <x-card>
                    <a href="{{ route('user.articles.show', $article) }}" class="font-bold text-xl text-black">{{ ($article->heading) }}</a>
                </x-card>
            @empty
                <p class="text-white">NO BOOKS FOR THIS AUTHOR</p>
            @endforelse

            
            </div>
        </div>
    </div>
@endsection
