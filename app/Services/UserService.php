<?php

namespace App\Services;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function CreateUser($email,$userName,$password)
    {
        $user = User::create([
            'email' => $email,
            'userName' => $userName,
            'password' => Hash::make($password)
            // 'img' => $request->input('img')
            // 'img' => $request->input('img_path')
        ]);

        return $user;
    }
}
