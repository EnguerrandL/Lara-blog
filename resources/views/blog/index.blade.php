@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <h1 >Mon blog</h1>

    <button type="button" class="btn btn-danger"><a href="">Tous supprimer</a></button>

    {{-- @dump($posts) --}}

    @foreach ($posts as $post)

    <div class="container">

    <h2>{{  $post->title }}</h2>
<p class="small">Catégorie {{ $post->category?->name }}, 


    @if(!$post->tags->isEmpty())

    Tag : 

    @foreach ($post->tags as $tag )
        
        <span class="badge bg-secondary">{{ $tag->name }}</span>

    @endforeach

    @endif


</p>

       

    <p>{{   $post->content    }}</p>
    <div class="row col-2 mb-2">
        <button type="button" class="btn btn-success"><a href="{{ route('blog.edit', ['slug' => $post->slug, 'post' => $post->id])}}"></a>Editer</button>
        <button type="button" class="btn btn-danger">Supprimer</button>

    </div>
    </div> 



 

    <p>
        <a  class="btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id])}}">Lire la suite</a>
    </p>
        
    @endforeach


    {{ $posts->links() }}

@endsection