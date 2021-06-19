<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedPosts extends Model
{
    use HasFactory;
    protected $table = 'featured_posts';

    public $primaryKey = "id";
    protected $guarded = [];

    public function post(){
        return $this->belongsTo(Post::class);
    }

}
