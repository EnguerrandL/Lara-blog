@extends('base')






@section('content')
    
<h2>Ajouter un nouveau post à votre blog</h2>
<form  class="container " action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group ">

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


        <label for="image" class="form-label">Image d'illustration</label>
        <input class="form-control" type="file" name="image">

  

        <button class="mt-3 container  col-5  btn btn-success">
         Ajouter ce nouveau post à votre blog
        </button>

     </div>


  

</form>




@endsection