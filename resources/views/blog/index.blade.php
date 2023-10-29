@extends('base')

@section('title', 'Accueil du blog')

@section('content')

    <h1>Mon blog</h1>



    <div class="container-fluid col-12">
        <div class="row ">
            <div class="col">

                <div class="list-group ">

                    <h5 class="text-center disabled list-group-item list-group-item-action list-group-item-primary">
                        Catégories </h5>
                    @foreach ($categories as $category)
                        <a href="{{ route('blog.showCategory', $category->name) }}"
                            class="list-group-item list-group-item-action list-group-item-primary">
                            {{ $category->name }} </a>
                    @endforeach

                </div>

            </div>
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

        </div>
    </div>



    {{-- {{ $posts->links() }} --}}



@endsection
