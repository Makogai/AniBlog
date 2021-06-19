<?php

namespace App\Observers;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostsCategoriesRelation;

class CategoryObserver
{
    public function deleted(Category $category)
    {
        PostsCategoriesRelation::where('category_id', '=', $category->id)->update(['category_id'=> 1]);
    }
}
