<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    use HasFactory;


    // Autorisé la création avec ces champs
    protected $fillable = [
        'title', 
        'slug',
        'content',
        'category_id',
        'tags_id'
    ];


    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


    // Interdire la création avec les champs indiquer dans le tableau
    protected $guarded = [];
};
