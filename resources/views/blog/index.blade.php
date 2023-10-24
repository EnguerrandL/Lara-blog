@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <h1 >Mon blog</h1>



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

    </div> 



 

    <p>
        <a  class="btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id])}}">Lire la suite</a>
    </p>
        
    @endforeach


    {{ $posts->links() }}

@endsection