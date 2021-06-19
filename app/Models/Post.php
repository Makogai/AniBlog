<?php

namespace App\Models;
use App\Traits\FileHandling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{

    use FileHandling,SoftDeletes;


    protected $table = 'posts';

    public $primaryKey = "id";
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'create_user_id');
    }
    public function categories(){
        return $this->hasMany(PostsCategoriesRelation::class);
    }

    public function getPostImageAttribute($value){
        return strpos($value, "http") === false ? asset($value) : $value;
    }

    public function setPostImageAttribute($value)
    {
        if($value)
            $this->attributes["post_image"] = is_string($value) ? $value : User::storeFile($value, "posts");
    }


}
