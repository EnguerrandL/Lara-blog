@extends('base')

@section('content')
    <h1>Page catégorie </h1>
    <ul class="list-group">
        <div class="col-8">
            @foreach ($posts as $post)
                <div class="card " style="width: 40rem;">




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
