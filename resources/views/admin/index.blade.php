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
                   
                     
                          <p>  {{ $post->title }} - {{ $post->postStatus() }} </p>
                        
                   


                             <a class="   btn btn-warning" href="{{route('admin.update', $post)}}" >Editer</a>
                            <a  class="    btn btn-primary"href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id])}}">Voir la publication</a>
                            <form  class="m-3 column"  action="{{ route('admin.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                  </svg></button>

                                
                            </form>
                 

                    
                    </li>
            
                @endforeach
            </ul>
        </div>
    </div>
</div>

  
@endsection