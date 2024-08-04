
@extends ('layouts.app') 
 @section('content')
<div class="container"> 
    <h1>All articles</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>heading</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
@foreach ($articles as $book)
<tr>
<td>{{ $article->heading }}</td>
<td>{{ $article->subheading }}</td>
<td>{{ $article->category }}</td>
<td>
@if ($article->img_src)
@else
<img src="{{ $article->img_src }}" alt="{{ $article->heading }}" width="100":
No Image
@endif
</td>
</tr>
@endforeach
</tbody>
</table>D
</div>
@endsection