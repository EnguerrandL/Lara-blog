@extends('base')

@section('title', 'Administration de votre blog')

@section('content')

    {{-- @include('admin.side-nav-bar') --}}



    <h2 class="mt-5 mb-5 text-center text-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
            fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
            <path
                d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
            <path
                d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
        </svg> Vos publications</h2>
    <div class="container-fluid">



        <div class="row">
            <div class="col-md-10 mx-auto">
                <ul class="list-group">
                    @foreach ($posts as $post)
                        {{-- @php
                    dd($post->image)
                @endphp --}}



                        @if ($post->tags->isNotEmpty())
                            <h6>Tags :
                                @foreach ($post->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </h6>
                        @endif



                        @if ($post->category)
                            <h6>Catégorie :
                                <span class="badge bg-secondary">{{ $post->category?->name }}</span>
                            </h6>
                        @endif



                        <li class="list-group-item list-group-item-primary d-flex justify-between  align-items-center mb-3">




                            @if ($post->image)
                                <img src="{{ $post->imgUrl() }}" class="rounded float-left" width="200"
                                    alt="Responsive image">
                            @endif


                            <p> {{ $post->title }} - {{ $post->postStatus() }} </p>




                            <a class="   btn btn-warning" href="{{ route('admin.update', $post) }}">Editer</a>
                            <a
                                class="    btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Voir
                                la publication</a>
                            <form class="m-3 column" action="{{ route('admin.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="25" fill="currentColor" class="bi bi-trash"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg></button>


                            </form>



                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
