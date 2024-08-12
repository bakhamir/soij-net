<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Services\AuthService;
use App\Services\ImageService;
use App\Services\UserService;

class UserController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {


        ImageService::PutImage($request->img);

        $user = UserService::CreateUser(
        $request->input('email'),
        $request->input('userName'),Hash::make($request->input('password')),
        $request->input('phoneNum'),
        $request->input('profileId'),
        $request->input('subPlanId'),
        $request->input('sex'),
        $request->input('age') 
        );
        
        $image = ImageService::CreateImage(
        $request->file('img')->getClientOriginalName(),
        $request->file('img')->getClientOriginalExtension(),
        $user->id);

        $token = AuthService::generateToken($request->input('email'));
        
        // $arr = array($user, $image,$token);

        return response()->json(['token'=> $token]  ,201);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
