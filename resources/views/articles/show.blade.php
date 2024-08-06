@extends('layouts.app')

@section('content')

<div class="container">
<h1>View article</h1>
<table class="table table-hover">
<tbody>
<tr>
<td><strong> Title </strong> </td> <td>{{ $articles-> heading }}</td>
</tr>
<tr>
<td><strong>
Description </strong> </td>
<td>{{ $articles->subheading }}</td>
</tr>
<tr>
<td><strong> Category </strong> </td> <td>{{ $articles->category }}</td>
<x-primary-button><a href="{{ route('articles.edit', $articles)}}">edit</a> </x-primary-button>
<form action="{{ route('articles.destroy', $articles) }}" method="POST">
    @method('delete')
    @csrf
    <x-primary-button onclick="return confirm('Are you sure you want to do delete?')">Delete </x-primary-button>
</form>
</tr>
</tbody>
</table>
</div>
@endsection
