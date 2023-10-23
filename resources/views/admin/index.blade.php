@extends('base')

@section('title', 'Administration de votre blog')

@section('content')

{{-- @include('admin.side-nav-bar') --}}


<h2>Vos publications</h2>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item list-group-item-primary d-flex justify-content-between align-items-center mb-3">
                        <div>
                            {{ $post->title }} - Publié le : {{ $post->created_at }}
                        </div>
                        <div>
                            <form action="{{ route('admin.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                            <a class="mt-2 btn btn-warning" href="{{route('admin.update', $post)}}" role="button">Editer</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

  
@endsection