<?php

namespace App\Http\Controllers;

use App\Models\FeaturedPosts;
use App\Models\Footer;
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
        $latest = Post::latest()->with('categories')->take(6)->get();
        $footer = Footer::first()->with('footericons')->get();


        $data = [
            "featured" => $featured,
            "latest" => $latest,
            "footer" => $footer,
        ];

        return view('main.index')->with($data);
    }
    public function post($id,$slug)
    {
        $post = Post::where('slug', $slug)->where('id', $id)->first();
        $footer = Footer::first()->with('footericons')->get();
        $random = Post::inRandomOrder()->take(6)->get();

        $data = [
            "post" => $post,
            "footer" => $footer,
            "random" => $random,
        ];
// dd($post);

        // return view('main.post', compact("post", $post), compact("footer", $footer));
        return view('main.post')->with($data);
    }
}
