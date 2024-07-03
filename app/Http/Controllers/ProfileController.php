<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create(Request $request){

        $profile = Profile::create($request->all());
        return response()->json($profile,201);
    }
    public function read(int $id)
    {
        $profile = Profile::find($id);
        return response()->json($profile,200);
    }
    public function update(Request $request,int $id)
    {
        $profile = Profile::find($id);
        $profile->update($request->all());
        return response()->json($profile,201);
    }
    public function delete(int $id){    
     $profile = Profile::find($id);
     $profile->delete();
     return response()->json($profile,201);

    }
    public function uploadImage(){
        
    }
}
