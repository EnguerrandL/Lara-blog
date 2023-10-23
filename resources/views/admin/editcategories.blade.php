@extends('base')

@section('content')

<h2>Modification de votre catégorie :  {{ $category->name }}</h2>

<form  action="{{ route('admin.update.category', $category->id) }}" method="POST">

  @csrf

  {{-- @method('UPDATE') --}}

  <div class="mb-5 mt-5 col-6 form-group mx-auto">

      <label for="name">Modification catégorie</label>
      <input class="form-control" type="text" name="name" value=" {{old('title', $category->name)}}">
      @error('name')
      {{ $message }}
      @enderror


      <button class="btn btn-success">
       Mettre à jour
      </button>

   </div>

</form>


 @endsection