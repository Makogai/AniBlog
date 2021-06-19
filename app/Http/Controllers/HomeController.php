<?php

namespace App\Http\Controllers;

use App\Models\FeaturedPosts;
use Illuminate\Http\Request;

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

        $data = [
            "featured" => $featured,
        ];


        return view('main.index')->with($data);
    }
}
