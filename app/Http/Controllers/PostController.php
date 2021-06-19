<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PostsCategoriesRelation;
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
        $objects = Post::with([
            'categories' => function ($query) {
                $query->select(['id', 'post_id', 'category_id','create_user_id', 'created_at', 'updated_at'])
                    ->with([
                        'category' => function ($query) {
                            $query->select(['id', 'name','color','created_user_id','created_at', 'updated_at']);
                        }
                    ]);
            }
        ])->get();
        $categories = Category::get();

        $data = ["objects"=>$objects,"categories"=>$categories,];
        return view("admin.posts.index")->with($data);
    }


    public function store(PostRequest $request){
        $data = $request->validated();
        $data["create_user_id"] = Auth::user()->id;
        if(isset($data["categories"])){
            $categories = $data["categories"];
            unset($data["categories"]);
        }
        $post = Post::create($data);
        if(isset($categories) && count($categories)>0){
            foreach ($categories as $category){
                PostsCategoriesRelation::create([
                    'post_id' => $post->id,
                    'category_id' => $category,
                    'create_user_id' => Auth::user()->id
                ]);
            }
        }
        return response()->json(["success" => "success"], 200);
    }

    public function edit(PostRequest $request, Post $object) {
        $data = $request->validated();
        if(isset($data["categories"])){
            $categories = $data["categories"];
            unset($data["categories"]);
        }
        $object->fill($data);
        $object->save();
        if(isset($categories) && count($categories)>0){
            PostsCategoriesRelation::where('post_id',$object->id)->delete();
            foreach ($categories as $category){
                PostsCategoriesRelation::create([
                    'post_id' => $object->id,
                    'category_id' => $category,
                    'create_user_id' => Auth::user()->id
                ]);
            }
        }
        return response()->json(['success' => 'success'], 200);
    }


    public function delete($id){
        $object = Post::find($id);


        if($object)
            $object->delete();
        return back()->with("success", "Post successfully Deleted!");
    }

    public function getOne($id){
        $object = Post::with([
            'categories' => function ($query) {
                $query->select(['id', 'post_id', 'category_id','create_user_id', 'created_at', 'updated_at'])
                    ->with([
                        'category' => function ($query) {
                            $query->select(['id', 'name','color','created_user_id','created_at', 'updated_at']);
                        }
                    ]);
            }
        ])->find($id);
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
