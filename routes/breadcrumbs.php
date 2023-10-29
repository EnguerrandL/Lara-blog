<?php 
// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use App\Models\Post;
use Diglactic\Breadcrumbs\Breadcrumbs;


// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// dd(__FILE__);
// Home
Breadcrumbs::for('blog.index', function (BreadcrumbTrail $trail) {
    $trail->push('Accueil', route('blog.index'));
});



// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category ) {
    $trail->parent('blog.index');
    $trail->push($category, route('blog.showCategory', $category));
});// Home > Blog


Breadcrumbs::for('show', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('blog.index');
    $trail->push($post->title, route('blog.show', ['slug' => $post->slug, 'post' => $post->id]));
});