<?php

namespace App\Services;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class LoginService
{
    public static function login($credentials)
    {
        if (Auth::attempt($credentials)) {

            $token = AuthService::generateToken($credentials['email']);
            return response()->json(['token' => $token],201);     
        }

        return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
