<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Validation\PictureValidation;

class PictureController extends Controller
{
    public function store(Request $request, PictureValidation $validation) {
        return response()->json(Auth::user());
        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());
        
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],401);
        }

        $fullFileName = $request->file('image')->getClientOriginalName();
        $fileName=pathinfo($fullFileName,PATHINFO_FILENAME);
        $extension=$request->file('image')->getClientOriginalExtension();
        $file= $fileName.'_'.time().'.'.$extension;

        $request->file('image')->storeAs('public/pictures',$file);

        $picture = Picture::create([
            'image' => $file,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);
        return response()->json($picture);
    }
}
