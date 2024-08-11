@extends('layouts.app')

@section('content')
    <div class="container mx-auto text-center text-white">
        <h1 class="text-4xl font-bold mb-4">View Article</h1> <!-- Increased title size -->
        <table class="table table-hover mx-auto rounded-lg overflow-hidden" style="background-color: black; padding: 20px;"> <!-- Added padding to the table -->
            <tbody>
                <tr>
                    <td><strong class="text-xl">Heading</strong></td> <!-- Strong text larger -->
                    <td class="text-lg">{{ $articles->heading }}</td> <!-- Regular text size -->
                </tr>
                <tr>
                    <td><strong class="text-xl">Subheading</strong></td>
                    <td class="text-lg">{{ $articles->subheading }}</td>
                </tr>
                <tr>
                    <td><strong class="text-xl">Description</strong></td>
                    <td class="text-lg">{{ $articles->body }}</td>
                </tr> 
                <tr>
                    <td><strong class="text-xl">Category</strong></td>
                    <td class="text-lg">{{ $articles->category }}</td>
                </tr>
                <tr>
                    <td><strong class="text-xl">Date Published:</strong></td>
                    <td class="text-lg">{{ $articles->pub_date }}</td>
                </tr>
                <tr>
                    <td><strong class="text-xl">References</strong></td>
                    <td class="text-lg">{{ $articles->references }}</td>
                </tr>
                <tr>
                    <td><strong class="text-xl">Author:</strong></td>
                    <td class="text-lg">{{ $articles->author->name }}</td>
                </tr>
                <tr>
                    <td><strong class="text-xl">Image</strong></td>
                    <td class="text-lg">{{ $articles->img_src }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <x-primary-button style="background-color: green;" class="rounded-lg">
                            <a href="{{ route('admin.articles.edit', $articles) }}" class="text-white">Edit</a>
                        </x-primary-button>
                        <form action="{{ route('admin.articles.destroy', $articles) }}" method="POST" style="display: inline;">
                            @method('delete')
                            @csrf
                            <x-primary-button style="background-color: green;" class="rounded-lg" onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection



