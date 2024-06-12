<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


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
        if (Auth::attempt($credentials)) {
            dd($credentials);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        dd("errr");

        return back()->withErrors([
            
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
}
