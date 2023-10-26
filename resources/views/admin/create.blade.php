@extends('base')






@section('content')
    <h2 class="text-center text-primary mb-5 mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
      </svg>  Ajouter une nouvelle publication</h2>
    <form class="container " action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">

            <label for="title">Titre de votre publication</label>
            <input class="form-control" type="text" name="title" value="">
            @error('title')
                {{ $message }}
            @enderror

            <label for="slug">Slug de votre publication</label>
            <input class="form-control" type="text" name="slug" value="">
            @error('slug')
                {{ $message }}
            @enderror

            <label for="content">Contenu de votre publication</label>
            <textarea class="form-control" name="content"></textarea>
            @error('content')
                {{ $message }}
            @enderror


            <select class="form-select" name="category_id" id="">
                <option value="">Selectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach


            </select>

            @error('category_id')
            {{ $message }}
            @enderror


            @php 
              
            $tagIds = $post->tags->pluck('id');
            @endphp 

            <select class="form-select"  id="tag" name="tags[]" multiple >
                <option disabled>Selection des tags</option>

                @foreach ($tags as $tag)
                    <option @selected($tagIds->contains($tag->id))  value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
            {{ $message }}
            @enderror
    


            <label for="image" class="form-label">Image d'illustration</label>
            <input class="form-control" type="file" name="image">
            @error('image')
            {{ $message }}
            @enderror
    

            <button class="mt-3 container  col-5  btn btn-success">
                Ajouter ce nouveau post à votre blog
            </button>

        </div>




    </form>
@endsection
