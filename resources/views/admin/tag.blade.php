@extends('base')

@section('content')

<H2>Gestion des tags</H2>


<form  action="{{ route('admin.tag.store') }}" method="POST">
    @csrf
    <div class="form-group">

        <label for="name">Titre de votre publication</label>
        <input class="form-control" type="text" name="name" value="">
        @error('name')
        {{ $message }}
        @enderror
 

  

        <button class="btn btn-success">
        Ajouter un nouveau tag
        </button>

     </div>

</form>

<div class="row">
    <div class="col-md-6">
        <ul class="list-group">
            @foreach ($tags as $tag)
                <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center mb-3">
                    <div>
                        {{ $tag->name }} - Publié le : {{ $tag->created_at }}
                    </div>
                    <div>
                        <form action="{{route('tag.destroy', $tag)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                        <a class="mt-2 btn btn-warning" href="{{ route('admin.edit.tag', $tag) }}" role="button">Editer</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</div>


@endsection