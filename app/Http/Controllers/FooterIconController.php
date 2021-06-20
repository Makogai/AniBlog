<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterIconRequest;
use App\Models\FooterIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterIconController extends Controller
{
    public function index()
    {
        $categories = FooterIcon::get();
        $data = ["objects" => $categories];
        return view("admin.footer.footericons")->with($data);
    }
    public function store(FooterIconRequest $request){
        $data = $request->validated();
        $data['created_user_id'] = Auth::user()->id;
        $data['footer_id'] = 1;
        FooterIcon::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(FooterIconRequest $request, FooterIcon $object) {
        $data = $request->validated();
        $object->fill($data);
        $object->save();
        return response()->json(['success' => 'success'], 200);
    }


    public function delete($id){
        $object = FooterIcon::find($id);


        if($object)
            $object->delete();
        return back()->with("success", "Footer Icon successfully Deleted!");
    }

    public function getOne($id){
        $object = FooterIcon::find($id);
        return $object ? $object : null;
    }

}
