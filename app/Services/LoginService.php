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
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $token = AuthService::generateToken($credentials['email']);

            return $token;
        }
        return null;
    }
}
