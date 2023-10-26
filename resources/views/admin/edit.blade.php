@extends('base');

{{-- @yield('title', 'Edition de {{ $post->title}}' ) --}}



@section('content')
    {{-- @include('admin.side-nav-bar') --}}


    <h2 class="  text-primary mx-auto mt-5 mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z"/>
      </svg>  Editer votre publication : {{ $post->title }}</h2>
    <form action="{{ route('admin.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">

            <label for="title">Titre de votre publication</label>
            <input class="form-control" type="text" name="title" value="{{ old('title', $post->content) }}">
            @error('title')
                {{ $message }}
            @enderror

            <label for="slug">Slug de votre publication</label>
            <input class="form-control" type="text" name="slug" value="{{ old('slug', $post->slug) }}">
            @error('slug')
                {{ $message }}
            @enderror

            <label for="content">Contenu de votre publication</label>
            <textarea class="form-control" name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                {{ $message }}
            @enderror

         

            <div class="row mt-3 mb-3">

                @if ($post->image)
                    <div class="row"> <img src="{{ $post->imgUrl() }}" alt="" style="width: 200px"></div>
                @endif

                <label for="image" class="form-label">Editer l'image d'illustration</label>

                <input class="form-control" type="file" name="image">
            </div>



            <button class="btn btn-success">
                Enregistrer
            </button>

        </div>




    </form>
@endsection
