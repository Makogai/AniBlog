<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index(){
        $user = Auth::user()->name;
        $user_posts = Post::where('create_user_id', Auth::user()->id)->count();

        // $user_posts = $user->post()->count();
        //$top_category = Category::withCount('post')->count();

        $top_category = DB::table('posts')
            ->join('posts_categories_relations', 'posts.id', '=', 'posts_categories_relations.post_id')
            ->join('users', 'users.id','=','posts_categories_relations.create_user_id')
            ->join('categories', 'categories.id','=','posts_categories_relations.category_id')
            ->where('posts.create_user_id', '=', Auth::user()->id)
            ->select(DB::raw('count(*) as repetition, categories.name'))
            ->groupBy('categories.name')
            ->orderBy('repetition', 'desc')->take(1)
            ->get();
        // dd($top_category[0]['name']);

        $data = [
          "user" => $user,
            "posts" => $user_posts,
            "top_category" => $top_category
        ];
        return view("admin.user")->with($data);
    }

    public function getOne($id){
        $object = User::find($id);
        return $object ? $object : null;
    }

    public function edit(UserRequest $request, User $object) {
        $data = $request->validated();
        $object->fill($data);
        $object->save();
        return response()->json(['success' => 'success'], 200);
    }

    public function updateImage(Request $request, $id)
    {
        $old_img = Auth::user()->image_path;
        $old_img = explode("/", $old_img);
        $old_img = $old_img[6];

        // $old_img = User::select('image_path')->where('id', Auth::user()->id)->first()-;

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->image);
        $image_base64 = base64_decode($image_parts[1]);
        $file = uniqid() . '.png';
        $file_fol = $folderPath . $file;
        file_put_contents($file_fol, $image_base64);
        Storage::putFileAs("public/images/users/", $folderPath.'/'.$file, $file);
        $url = Storage::url("public/images/users/".$file);
        File::delete($file_fol);
        Storage::delete("public/images/users/".$old_img);
        User::where('id', $id)->update(['image_path' => $url]);
        return response()->json(['success' => 'success'], 200);

    }
}
