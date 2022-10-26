<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Protect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $credentials = $request->only('email','password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('/');
        }else{
            return redirect()->intended('/login');
        }
        return $next($request);
    }
}
