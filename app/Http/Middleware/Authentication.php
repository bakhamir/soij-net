<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PDO;
use App\Models\User;
class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('token')){

            $token = $request->header('token');
            $values = Redis::command('lrange', [$token, 0, -1]);
        //    dd($values);
            if(Carbon::now()->lt($values[2]))
            {
                $user = User::where('id','=',intval($values[0]))->first();
                $request->merge(["user" => $user]);
                return $next($request);
            }
            
            return "error";
            // dd('laravel_database_' . $token);
            // dd(Redis::lrange('laravel_database_' . $token,0,-1));
            // dd($values);
        }
    }
}
