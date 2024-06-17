<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
     public function create(Request $request){

        $preference = Preference::create($request->all());
        return response()->json($preference,201);
    }
    public function read(int $id)
    {
        $preference = Preference::find($id);
        return response()->json($preference,200);
    }
    public function update(Request $request,int $id)
    {
        $preference = Preference::find($id);
        $preference->update($request->all());
        return response()->json($preference,201);
    }
    public function delete(int $id){    
     $preference = Preference::find($id);
     $preference->delete();
     return response()->json($preference,201);

    }
}
