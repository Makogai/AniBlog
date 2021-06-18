<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::get();
        $data = ["objects" => $categories];
        return view("admin.category.index")->with($data);
    }
    public function store(CategoryRequest $request){
        $data = $request->validated();
        Category::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(CategoryRequest $request, Category $object) {
        $data = $request->validated();
        $object->fill($data);
        $object->save();
        return response()->json(['success' => 'success'], 200);
    }


    public function delete($id){
        $object = Category::find($id);


        if($object)
            $object->delete();
        return back()->with("success", "Category successfully Deleted!");
    }

    public function getOne($id){
        $object = Category::find($id);
        return $object ? $object : null;
    }

    public function restore($id){
        Category::where("id", $id)->restore();


		return back()->with("success", "Category successfully restored!");
    }

    public function deleted(){
        $posts = Category::onlyTrashed()->get();
        $data = ['objects' => $posts];
        return view("admin.category.deleted")->with($data);
    }

}
