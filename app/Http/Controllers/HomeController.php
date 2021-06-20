<?php

namespace App\Http\Controllers;

use App\Models\FeaturedPosts;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featured = FeaturedPosts::with('post')->get();
        $latest = Post::latest()->with('categories')->take(4)->get();

        $data = [
            "featured" => $featured,
            "latest" => $latest,
        ];


        return view('main.index')->with($data);
    }
    public function post($id)
    {
        $post = Post::find($id)->get();

        $data = [
            "post" => $post,
        ];


        return view('main.post')->with($data);
    }
}
