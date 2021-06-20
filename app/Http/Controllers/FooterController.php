<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterRequest;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterController extends Controller
{

    public function index(){
        $footer = Footer::with('footericons')->first();
        return view('admin.footer.index',compact("footer",$footer));
    }
    public function store(FooterRequest $request){
        $data = $request->validated();
        $data['created_user_id'] = Auth::user()->id;
        Footer::create($data);
        return response()->json(["success" => "success"], 200);
    }

    public function edit(FooterRequest $request, Footer $object) {
        $data = $request->validated();
        $data['updated_user_id'] = Auth::user()->id;
        $object->fill($data);
        $object->save();
        return response()->json(['success' => 'success'], 200);
    }


    public function getOne($id){
        $object = Footer::find($id);
        return $object ? $object : null;
    }

}
