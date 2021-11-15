<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
        protected $table = 'articles';


    protected $fillable = ['title','content','category','category_id','tag'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
    return $this->belongsToMany(Tag::class, 'article_tag','article_id', 'tag_id');

    }
}
