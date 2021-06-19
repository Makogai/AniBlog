<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeaturedPostsRequest;
use App\Models\FeaturedPosts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class FeaturedPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f_posts = FeaturedPosts::with('post')->get();
        $posts = Post::select('id', 'title')->where('featured', 0)->get();
        $data = [
            "objects" => $f_posts,
            "posts" => $posts,
        ];
        return view('admin.featured.index')->with($data);
    }

    public function store(FeaturedPostsRequest $request){
        $data = $request->validated();
        $data["user_id"] = Auth::user()->id;
        $post_id = $data['post_id'];
        Post::where('id', $post_id)->update(['featured'=>1]);
        FeaturedPosts::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(FeaturedPostsRequest $request, FeaturedPosts $object) {
		$data = $request->validated();
		$object->fill($data);
		$object->save();
		return response()->json(['success' => 'success'], 200);
	}

    public function getOne($id){
        $object = FeaturedPosts::find($id);
        return $object ? $object : null;
    }

    public function destroy($id){
        $object = FeaturedPosts::find($id);
        $post_id = FeaturedPosts::select('post_id')->where('id',$id)->first()->post_id;
        Post::where('id', $post_id)->update(['featured'=>0]);
        if($object)
            $object->delete();
        return back()->with("success", "Element uspješno obrisan!");
    }


}
