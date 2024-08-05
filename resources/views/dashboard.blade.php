<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        
<header>
<!-- Navigation menu or header content -->
<nav>
<ul>
<li><a href="{{ route('articles.index') }}">All Articles</a></li> </li>
<a href="{{ route('articles.create') }}" class="btn btn-primary">Create New Article</a>

<!-- Add more navigation links as needed -->
</ul>
</nav>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
