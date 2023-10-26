<?php


use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [Authcontroller::class,'login'])->name('auth.login');
Route::post('/login', [Authcontroller::class,'loged']);
Route::delete('/logout', [Authcontroller::class,'logOut'])->name('auth.logout');

Route::prefix('/admin')->middleware('auth')->controller(AdminController::class)->group(function(){
    Route::get('/', 'index')->name('admin.index');
    Route::get('/create',  [AdminController::class, 'create'])->name('admin.create');
    Route::get('/create-categories', [AdminController::class, 'createCategories'])->name('admin.create.categories');
    Route::post('/create-categories', [AdminController::class, 'storeCategorie'])->name('admin.store.categories');
    Route::delete('/create-categories/{category}', [AdminController::class, 'destroyCategorie'])->name('admin.delete.categories');
    Route::post('/edit-categories/{category}', [AdminController::class ,'updateCategory'])->name('admin.update.category');
    Route::get('/edit-categories/{category}', [AdminController::class ,'editCategory'])->name('admin.edit.category');
    Route::get('/tag',  [AdminController::class, 'tagIndex'])->name('admin.tag');
    Route::post('/tag', [AdminController::class, 'storeTag'])->name('admin.tag.store');
    Route::get('/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.edit.tag');
    Route::post('/tag/{tag}', [AdminController::class, 'updateTag'])->name('admin.update.tag');
    Route::delete('/tag/{tag}', [AdminController::class, 'destroyTag'])->name('tag.destroy');

    Route::post('/create', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/{post}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/{post}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/{post}/edit', [AdminController::class, 'update'])->name('admin.update');
  

});





Route::prefix('/')->name('blog.')->controller(BlogController::class)->group(function(){
    Route::get('/', 'index' )->name('index');

    // Route::get('/new', 'create')->name('create');
    // Route::post('/new', 'store');
    // Route::get('/{post}/edit', 'edit')->name('edit');
    // Route::post('/{post}/edit', 'update');

    
    Route::get('/{slug}/{post}', 'show')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9\-]+' 
    ])->name('show');




    // Route::get('/{post:slug}', 'show')->where([
    //     'post' => '[a-z0-9\-]+',

    // ])->name('show');
    
});

