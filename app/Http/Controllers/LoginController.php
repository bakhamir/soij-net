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
class LoginController extends Controller 
{
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
  
        ]);
        // dd(Carbon::now());
        // dd($credentials);
        if (Auth::attempt($credentials)) {

            $token = AuthService::generateToken($credentials['email']);
            return response()->json(['token' => $token],201);     
        }

        return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
            
    }
}
