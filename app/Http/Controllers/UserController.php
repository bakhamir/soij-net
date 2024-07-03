<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


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
        $date = date('Y-m-d H:i:s');
        $path = ;
        Storage::disk('avatar')->put(Str::random(6) .  '.png', $request->input('img'));

        // mb_convert_encoding($contents['name'], 'UTF-8', 'UTF-8');

        $user = User::create([
            'email' => $request->input('email'),
            'userName' => $request->input('userName'),
            'password' => Hash::make($request->input('password')),
            'phoneNum' => $request->input('phoneNum'),
            'profileId' => $request->input('profileId'),
            'subPlanId' => $request->input('subPlanId'),
            'sex' => $request->input('sex'),
            'age' => $request->input('age'),
            'img' => $request->input('img')
            // 'img' => $request->input('img_path')
        ]);
        return response()->json($user,201);
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
