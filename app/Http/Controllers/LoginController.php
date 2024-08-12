<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use App\Services\LoginService;
class LoginController extends Controller 
{
    public function login(Request $request) 
    {
        $credentials = $request->validate
        ([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        
       $token = LoginService::login($credentials);
       dd($token);
       response()->json(['token' => $token],201);     
    }
}
