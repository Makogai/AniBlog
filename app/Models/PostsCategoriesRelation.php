<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Post;

class PostsCategoriesRelation extends Model
{
    use HasFactory;
    protected $table = "posts_categories_relations";

    public $primaryKey = "id";
    protected $guarded = [];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
