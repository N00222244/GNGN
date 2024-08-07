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

</tr>
</tbody>
</table>
</div>
@endsection
