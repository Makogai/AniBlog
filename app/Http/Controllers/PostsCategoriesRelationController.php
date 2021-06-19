<?php

namespace App\Http\Controllers;

use App\Models\PostsCategoriesRelation;
use Illuminate\Http\Request;
use App\Http\Requests\PostsCategoriesRelationRequest;
use Illuminate\Support\Facades\Auth;

class PostsCategoriesRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(PostsCategoriesRelationRequest $request){
        $data = $request->validated();
        $data["create_user_id"] = Auth::user()->id;
        PostsCategoriesRelation::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(PostsCategoriesRelationRequest $request, PostsCategoriesRelation $object) {
		$data = $request->validated();
		$object->fill($data);
		$object->save();
		return response()->json(['success' => 'success'], 200);
	}

    public function getOne($id){
        $object = PostsCategoriesRelation::find($id);
        return $object ? $object : null;
    }

    public function destroy($id){
        $object = PostsCategoriesRelation::find($id);
        if($object)
            $object->delete();
        return back()->with("success", "Element uspješno obrisan!");
    }

    public function deleted()
	{
        return view("admin.news-categories-relations.deleted")->withObjects( PostsCategoriesRelation::select('id' )->onlyTrashed()->get());
    }

    public function restore($id){
        PostsCategoriesRelation::where("id", $id)->restore();
		return back()->with("success", "Objekat uspješno aktiviran.");
    }
}
