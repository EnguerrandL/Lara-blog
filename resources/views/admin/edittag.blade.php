@extends('base')

@section('content')


<form  action="{{ route('admin.update.tag', $tag) }}" method="POST">
    @csrf
    <div class="mt-5 form-group">

        <label for="name">Editer votre tag</label>
        <input class="form-control" type="text" name="name" value="{{old('name', $tag->name)}}">
        @error('name')
        {{ $message }}
        @enderror
 

  

        <button class="btn btn-success">
        Enregistrer vos modifications
        </button>

     </div>

</form>


    
@endsection