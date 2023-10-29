@extends('base')

@section('content')
    <h1 class="mt-5 mb-5 text-center">Page catégorie : <strong>{{$category}}</strong> </h1>

    @include('breadcrumb')

    {{ Breadcrumbs::render('category', $category) }} 

    <ul class="list-group">
        <div class="container-fluid">
            @foreach ($posts as $post)
                <div class="card " >




                    <img class="card-img-top" src="{{ $post->imgUrl() }}" alt="">

                    <div class="card-body">


                        <li class="list-group-item">
                            <p class="small ">Catégorie <span class="badge bg-secondary">
                                    {{ $post->category?->name }}</span>
                        </li>

                        <li class="list-group-item">
                            @if (!$post->tags->isEmpty())
                                Tag :

                                @foreach ($post->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            @endif
                            </p>
                        </li>


                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <a
                            class="btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire
                            la
                            suite</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
