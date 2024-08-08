@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Articles</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Heading</th>
                <th>Subheading</th>
                <th>Category</th>
                <th>Image</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td><a href="{{ route('admin.articles.show', ['article' => $article->id]) }}">{{ $article->heading }}</a></td>
                <td>{{ $article->subheading }}</td>
                <td>{{ $article->category }}</td>
                <td>
                    @if ($article->img_src)
                        <img src="{{ $article->img_src }}" alt="{{ $article->heading }}" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $article->author->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.articles.create') }}" class="btn-link btn-lg mb-2">Add an Article</a>
</div>


@endsection

