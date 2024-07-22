<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Image;
class ProfileController extends BaseController
{

    protected $model = Profile::class;
    // public function create(Request $request){

    //     $profile = Profile::create($request->all());
    //     return response()->json($profile,201);
    // }
    // public function read(int $id)
    // {
    //     $profile = Profile::find($id);
    //     return response()->json($profile,200);
    // }
    // public function update(Request $request,int $id)
    // { 
    //     $profile = Profile::find($id);
    //     $profile->update($request->all());
    //     return response()->json($profile,201);
    // }
    // public function delete(int $id){    
    //  $profile = Profile::find($id);
    //  $profile->delete();
    //  return response()->json($profile,201);

    // }
    // public function uploadImage(Request $request){

    //     Storage::disk('avatar')->put('', $request->img);

    //     $image = Image::create([
    //         'img_name' => $request->file('img')->getClientOriginalName(),
    //         'img_type' => $request->file('img')->getClientOriginalExtension(),
    //         'user_id' => $request->input('id')
    //     ]);
    // }
}
