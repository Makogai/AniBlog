<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\CategoryObserver;

class Category extends Model
{
    use HasFactory,SoftDeletes;



    protected $table = 'categories';

    public $primaryKey = "id";
    protected $guarded = [];

    // public function post(){
    //     return $this->hasMany(Post::class);
    // }
    public static function boot() {
        parent::boot();
        Category::observe(CategoryObserver::class);
    }
}
