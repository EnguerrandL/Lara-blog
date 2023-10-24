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


    public function index(BlogFilterRequest $request): View{

     


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


