@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <!-- alert-success is a component I created to display a success message that may be sent from the controller.
            For example, when a publisher is deleted, a message like "Publisher Deleted Successfully" will be displayed -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        
            

            @forelse ($authors as $author)
                <x-card>
                  
                        <a href="{{ route('editor.authors.show', $author) }}" class="font-bold text-2xl">{{ $author->name }}</a>
            
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $author->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $author->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $author->address }}
                        </p>
            
                </x-card>   
            @empty
                <p>No authors</p>
            @endforelse
            
        </div>
    </div>
    @endsection
