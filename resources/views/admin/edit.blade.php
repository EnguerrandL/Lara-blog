@extends('base'); 

@yield('title', 'Edition de {{ $post->title}}' )



@section('content')

{{-- @include('admin.side-nav-bar') --}}


<h2>Editer votre publication : {{$post->title}}</h2>
<form  action="{{ route('admin.update', $post->id) }}" method="POST">
    @csrf
 
    <div class="form-group">

        <label for="title">Titre de votre publication</label>
        <input class="form-control" type="text" name="title" value="">
        @error('title')
        {{ $message }}
        @enderror
 
        <label for="slug">Slug de votre publication</label>
        <input class="form-control" type="text" name="slug"  value="" >
        @error('slug')
        {{ $message }}
        @enderror
   
        <label for="content">Contenu de votre publication</label>
        <textarea  class="form-control" name="content"></textarea>
        @error('content')
        {{ $message }}
        @enderror
   

  

        <button class="btn btn-success">
       Enregistrer
        </button>

     </div>


  

</form>







  
@endsection