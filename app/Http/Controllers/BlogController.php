<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View as ViewView;
use Illuminate\Support\Str;
class BlogController extends Controller
{



    public function create(){
        
        $post =  new Post();
        return view('blog.create', [
            'post' => $post,
        ]); 
    }


    public function store(FormPostRequest $request){
      

        $post = Post::create($request->validated());

        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'article a bien été sauvergardé');
          
    }


    public function edit(Post $post){
        
    //   dd(Tag::select('id', 'name')->get());
 
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get()
        ]);


    }


    public function update(Post $post, FormPostRequest $request){

        $post->tags()->sync($request->validated('tags'));

     $post->update($request->validated()); 
     return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'L\'article a mis à jour');

    }


  


    public function index(BlogFilterRequest $request): View{

        // $post = Post::find(2);
        // $post->category_id = 2;
        // $post->save();
        
        // $category = Category::find(1);    
        //     $category->posts()->where('id', '>', '10')->get();
        // dd(Post::all());

        // dd($request->validated());


        // $post = Post::find(2);
        // $post->tags()->createMany([[
        //     'name' => 'Tag 1'
        // ], [
        //     'name' => 'Tag 2'
        // ]]);



        return view('blog.index', [
            'posts' => Post::paginate(0)
        ]);
    }

    public function show (String $slug, Post $post): RedirectResponse | View{
     

      
        if ($post->slug != $slug){
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }


        return view('blog.show', [
            'post' => $post
        ]);
    }




}


