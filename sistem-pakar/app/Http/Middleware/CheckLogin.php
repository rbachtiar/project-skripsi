<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class CheckLogin
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
        $cookie = Cookie::get('login');
        if($cookie != null) {
            $value = Crypt::decryptString($cookie);
            if($value == 'login true') {
                return $next($request);
            }       
        }
        
        return redirect('/login');
    }
}
