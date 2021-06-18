<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();

        $user_count = User::count();
        $post_count = Post::count();
        $category_count = Category::count();

        $data = [
            "user_name" => $user['name'],
            "user_image" => $user['image_path'],
            "user_count" => $user_count,
            "post_count" => $post_count,
            "category_count" => $category_count,
        ];

        return view('admin.index')->with($data);
    }
}
