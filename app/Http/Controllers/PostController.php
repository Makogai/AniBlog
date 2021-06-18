<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Post::get();
        $categories = Category::get();

        $data = ["objects"=>$objects,"categories"=>$categories,];
        return view("admin.posts.index")->with($data);
    }


    public function store(PostRequest $request){
        $data = $request->validated();
        $data["user_id"] = Auth::user()->id;
        Post::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(PostRequest $request, Post $object) {
        $data = $request->validated();
        $object->fill($data);
        $object->save();
        return response()->json(['success' => 'success'], 200);
    }


    public function delete($id){
        $object = Post::find($id);


        if($object)
            $object->delete();
        return back()->with("success", "Post successfully Deleted!");
    }

    public function getOne($id){
        $object = Post::find($id);
        return $object ? $object : null;
    }

    public function restore($id){
        Post::where("id", $id)->restore();


		return back()->with("success", "Post successfully restored!");
    }

    public function deleted(){
        $posts = Post::onlyTrashed()->get();
        $data = ['objects' => $posts];
        return view("admin.posts.deleted")->with($data);
    }
}
