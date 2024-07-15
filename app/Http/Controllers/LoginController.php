<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\UserToken;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        return $this->authenticate($request);
    }
    
    // public function log(Request $request)
    // { 
    //     if ($request->isMethod('post')) {
         
    //       $email =$request('email');
    //       $password = $request('password');
             
    //      if (Auth::attempt(['email' => $email, 'password' =>$password])) { 
    //          dd("Ok");
    //        }
    //         else {
    //           dd("No");
    //          }

    //     } elseif ($request->isMethod('get')) {
    //         return redirect()->intended('dashboard');     
    //        }
    // }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            
        ]);
        if (Auth::attempt($credentials,$remember)) {
            // $request->session()->regenerateToken();
            $token = Redis::get('laravel_database_user' . User::where('email','like',$credentials[0]) -> first()->id);

            // return $token;
            return $token;
            //TODO fetch token from redis DB
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
            
    }
}
