<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function tagIndex()
    {

        $tag = Tag::select('name', 'id', 'created_at')
            ->orderBy('updated_at', 'DESC')
            ->orderBy('created_at', 'DESC')->get();

        return view('admin.tag', [
            'tags' => $tag,
        ]);
    }

    public function storeTag(FormPostRequest $request)
    {

        Tag::create($request->validated());

        return redirect()->route('admin.tag')->with('success', 'Votre tag a bien été ajouter');
    }


    public function editTag(Tag $tag)
    {
        return view('admin.edittag', [
            'tag' => $tag,
        ]);
    }


    public function  updateTag(Tag $tag, FormPostRequest $request)
    {

        $tag->update($request->validated());

        return redirect()->route('admin.tag')->with('success', 'Le tag a été mis à jour avec succès');
    }


    public function destroyTag(Tag $tag)
    {

        $tag->delete();

        return redirect()->route('admin.tag')->with('success', 'Le tag à bien été supprimer');
    }



    public function index()
    {

        $post = Post::all();
        $category = Category::all();
        $tag = Tag::all();



        
        return view('admin.index', [
            'posts' => $post,
            'categories' => $category,
            'tags' => $tag,
        ]);
    }


    public function create()
    {


        $post = new Post();
        $category = Category::all();
        $tag = Tag::all();

        return view('admin.create', [
            'post' => $post,
            'categories' => $category,
            'tags' => $tag,

        ]);
    }

    public function createCategories()
    {


        $categories =  Category::all();

        return view('admin.addcategories', [
            'categories' => $categories,

        ]);
    }

    public function storeCategorie(FormPostRequest $request)
    {



        Category::create($request->validated());


        return redirect()->route('admin.create.categories')->with('success', 'Votre catégorie a été ajouté');
    }


    public function editCategory(Category $category)
    {
        return view('admin.editcategories', [
            'category' => $category,
        ]);
    }


    public function updateCategory(Category $category, FormPostRequest $request)
    {

        $category->update($request->validated());

        $updated = $request->category->updated_at;



        return redirect()->route('admin.create.categories')
            ->with('success', 'Votre catégorie : ' .  $category->name . 'a été mise à jour ' . 'le : ' .  $updated);
    }


    public function destroyCategorie(Category $category)
    {


        $category->delete();

        return redirect()->route('admin.create.categories')
            ->with('success', 'La catégorie : ' . $category->name . 'a été supprimée');
    }

    public function store(FormPostRequest $request)
    {


        $post = new Post($this->extractData(new Post, $request));


        $post->save();
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('admin.index')->with('success', 'La publication à été crée');
    }


    public function edit(Post $post)
    {



        return view('admin.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),

        ]);
    }


    public function update(Post $post, FormPostRequest $request)
    {



        $post->update($this->extractData($post, $request));
        $post->tags()->sync($request->validated('tags'));

        return redirect()->route('admin.index', ['post' => $post])
            ->with('success', 'Votre publication à été mise à jour');
    }

    private function extractData(Post $post, FormPostRequest $request): array
    {


        $data = $request->validated();


        $image = $request->validated('image');

        if ($image === null || $image->getError()) {

            return $data;
        }
        if ($post->image) {

            Storage::disk('public')->delete($post->image);
        }
        $data['image'] = $image->store('blog', 'public');
        return $data;
    }






    public function destroy(Post $post)
    {

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }


        $post->delete();
        return redirect()->route('admin.index')->with('success', 'La publication à été supprimer');
    }
}
