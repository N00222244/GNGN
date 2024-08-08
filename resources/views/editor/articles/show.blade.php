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
                        <a href="{{ route('editor.articles.edit', $articles) }}">Edit</a>
                    </x-primary-button>
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
