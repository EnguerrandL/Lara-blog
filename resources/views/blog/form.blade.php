


    <form  action="" method="post">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="title" value="{{old('title', $post->title)}}">
     
        @error('title')
        {{ $message }}
        @enderror

    
         

                <input class="form-control" type="text" name="slug"  value="{{old('slug', $post->slug)}}" >
                @error('slug')
                {{ $message }}
                @enderror

       
    


       
            <textarea  class="form-control" name="content">{{old('content', $post->content)}}</textarea>
            @error('content')
            {{ $message }}
            @enderror


            
        <label for="category">Catégorie</label>
        <div class="form-group">
            <select class="form-control" id="category" name="category_id" value="">
                <option value="">Selectionner une catégorie</option>
                @foreach ($categories as $category)

                    <option @selected(old('category_id', $post->category_id) === $category->id ) value="{{$category->id}}">{{ $category->name}}</option>
                @endforeach

            </select>
     
        @error('category_id')
        {{ $message }}
        @enderror


        @php 
        
        $tagIds = $post->tags->pluck('id');
        @endphp 
        <label for="tag">Tag</label>
        <div class="form-group">
            <select class="form-control" id="tag" name="tags[]" value="" multiple>
           
              
                @foreach ($tags as $tag)
            
                    <option  @selected($tagIds->contains($tag->id))  value="{{$tag->id}}">{{ $tag->name}}</option>
                @endforeach

            </select>
     
        @error('tags')
        {{ $message }}
        @enderror

    

            <button class=" container btn btn-primary">
            
                @if($post->id) 
                Modifier 
                @else 
                Cree
            @endif
            
            </button>

         </div>


      

    </form>

  




  
