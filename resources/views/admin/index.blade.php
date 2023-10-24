@extends('base')

@section('title', 'Administration de votre blog')

@section('content')

{{-- @include('admin.side-nav-bar') --}}


<h2>Vos publications</h2>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <ul class="list-group">
                @foreach ($posts as $post)

        
                {{-- @php
                    dd($post->image)
                @endphp --}}
           
               
                    <li class="list-group-item list-group-item-primary d-flex justify-between  align-items-center mb-3">
                        @if ($post->image)
                        <img src="{{ $post->imgUrl() }}" class="rounded float-left"  width="200" alt="Responsive image">
                        @endif
                   
                     
                          <p>  {{ $post->title }} - Publié le : {{ $post->created_at }}</p>


                             <a class="   btn btn-warning" href="{{route('admin.update', $post)}}" >Editer</a>
                            <a  class="    btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id])}}">Voir la publication</a>
                            <form  class="m-3 column"  action="{{ route('admin.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " type="submit">X</button>
                            </form>
                 

                    
                    </li>
            
                @endforeach
            </ul>
        </div>
    </div>
</div>

  
@endsection