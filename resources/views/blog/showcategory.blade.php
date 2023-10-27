@extends('base')

@section('content')

<h1>Page catégorie </h1>
<ul class="list-group">
@foreach ($posts as $post)

<li class="list-group-item list-group-item-primary">
{{ $post->title}}    
  
</li>

@endforeach
</ul>
@endsection