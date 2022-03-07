<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public static function getUniqueSlugFromTilte($title) {
        //Control if existe a post with this slug
        $slug = Str::slug($title);
        $slug_base = $slug;

        $post_found = Post::where('slug', '=', $slug)->first();
        $counter = 0;
        while($post_found) {
            //if existe, add -1 to slug
            //check if there isn't slug -1, if existe try with -2
            $counter++;
            $slug = $slug_base . '-' . $counter;
            $post_found = Post::where('slug', '=', $slug)->first();    
        }

        return $slug;
    }

}
