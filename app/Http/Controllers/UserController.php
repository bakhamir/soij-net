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


        $redis = Redis::connection();
       Storage::disk('avatar')->put('', $request->img);
        $user = User::create([
            'email' => $request->input('email'),
            'userName' => $request->input('userName'),
            'password' => Hash::make($request->input('password')),
            'phoneNum' => $request->input('phoneNum'),
            'profileId' => $request->input('profileId'),
            'subPlanId' => $request->input('subPlanId'),
            'sex' => $request->input('sex'),
            'age' => $request->input('age')
            // 'img' => $request->input('img')
            // 'img' => $request->input('img_path')
        ]);
        $image = Image::create([
            'img_name' => $request->file('img')->getClientOriginalName(),
            'img_type' => $request->file('img')->getClientOriginalExtension(),
            'user_id' => $user->id
        ]);
        AuthService::generateToken($request->input('email'));
        $arr = array($user, $image);

        return response()->json($arr ,201);
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
