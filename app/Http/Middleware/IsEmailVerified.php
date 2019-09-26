<?php

namespace App\Http\Middleware;

use Closure;

class IsEmailVerified
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
        return isEmailVerified() ? $next($request) : redirect('email-not-verified');
        
    }
}
