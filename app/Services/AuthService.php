<?php

namespace App\Services;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class AuthService
{
    public static function generateToken(string $email)
    {
        $token = Str::random(30) . floor(microtime(true) * 1000) . User::where('email','like',$email)->first()->id;
        Redis::set('user' . User::where('email','like',$email)->first()->id, $token);
        $date = Carbon::now();
        // Redis::lpush( $token, 'user-id','user' . User::where('email','like',$email)->first()->id,, 'created', $date,'date-expire',);
        Redis::lpush( $token, User::where('email','like',$email)->first()->id);
        Redis::rpush( $token, $date);
        Redis::rpush( $token, $date->addDays(7));

        return $token;
    }
}
