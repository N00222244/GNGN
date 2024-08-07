@extends ('layouts.app') 

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
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article) 
             
            <tr> 
             <td> <a href="{{ route('user.articles.show', ['article' => $article->id]) }}"> {{ $article->heading }}</a></td>
                <td>{{ $article->subheading }}</td>
                <td>{{ $article->category }}</td>
                <td>
                
                    @if ($article->img_src) <!-- Corrected this condition -->
                        <img src="{{ $article->img_src }}" alt="{{ $article->heading }}" width="100">
                    @else
                        No Image
                    @endif
                </td>
                
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
@endsection
