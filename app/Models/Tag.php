<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $fillable = ['name'];


     public function article()
   {
       return $this->belongsToMany(Tag::class,'article_tag', 'tag_id', 'article_id');
   }
}
