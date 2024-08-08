@extends('layouts.app')

@section('content')

<div class="container">
    <h1>View Article</h1>
    <table class="table table-hover">
        <tbody>
            <tr>
                <td><strong>Title</strong></td>
                <td>{{ $articles->heading }}</td>
            </tr>
            <tr>
                <td><strong>Description</strong></td>
                <td>{{ $articles->subheading }}</td>
            </tr>
            <tr>
                <td><strong>Category</strong></td>
                <td>{{ $articles->category }}</td>
            </tr>
            <tr>
                <td><strong>Author:</strong></td>
                <td>{{ $articles->author->name }}</td>
            </tr>
            <tr>
            <tr>
                <td colspan="2">
                    <x-primary-button>
                        <a href="{{ route('admin.articles.edit', $articles) }}">Edit</a>
                    </x-primary-button>
                    <form action="{{ route('admin.articles.destroy', $articles) }}" method="POST" style="display: inline;">
                        @method('delete')
                        @csrf
                        <x-primary-button onclick="return confirm('Are you sure you want to delete?')">Delete</x-primary-button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

