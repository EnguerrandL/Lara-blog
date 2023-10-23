@extends('base')

@section('content')

<h2>Ajouter des catégories pour vos publication</h2>

<form  action="{{ route('admin.store.categories') }}" method="POST">
  @csrf

  <div class="mb-5 mt-5 col-6 form-group mx-auto">

      <label for="name">Ajout d'une nouvelle catégorie</label>
      <input class="form-control" type="text" name="name" value="">
      @error('name')
      {{ $message }}
      @enderror


      <button class="btn btn-success">
       Ajoutere une catégorie
      </button>

   </div>

</form>

     <div class="mx-auto col-10 ">
        <div class=" row ">
          <div class=" ">
            <ul class="list-group ">
            @foreach ( $categories as $category )
          
         
                <li class="col-12  list-group-item list-group-item-primary d-flex    justify-content-around  mb-3">
               {{  $category->name }}

               <a class=" col-2 btn btn-warning" href="{{ route('admin.edit.category', $category) }}">Editer</a>
            <form action="{{ route('admin.delete.categories',  $category)}}" class="col-2 " method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Supprimer</button>
       

            </form>
            
              </li>
                    
         
          
                    @endforeach
                

                 
                </ul>
                </div>
                </div>
                </div>
    

@endsection