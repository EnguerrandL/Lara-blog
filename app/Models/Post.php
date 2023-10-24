<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'tags_id',
       'image',
    ];


    public function category (){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function imgUrl(): string{
        return Storage::disk('public')->url($this->image);
    }

    public function postStatus() {

        // dd($this->created_at);
        if($this->updated_at >  $this->created_at ){
            return 'Dernière mise à jour : ' . $this->updated_at;
          
        } else  {
           
            return 'Date de création : ' . $this->created_at;
        }
    }


    // Interdire la création avec les champs indiquer dans le tableau
    protected $guarded = [];
};
