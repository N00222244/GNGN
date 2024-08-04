
@extends ('layouts.app') @section('content')
<div class="container">
<h1>View article</h1>
<table class="table table-hover">
<tbody>
<tr>
<td><strong> Title </strong> </td> <td>{{ $article->heading }}</td>
</tr>
<tr>
<td><strong>
Description </strong> </td>
<td>{{ $article->subheading }}</td>
</tr>
<tr>
<td><strong> Category </strong> </td> <td>{{ $article->category }}</td>
</tr>
</tbody>
</table>
</div>
@endsection
