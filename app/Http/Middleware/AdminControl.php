<?php

namespace App\Http\Middleware;

use Closure;

class AdminControl
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
        if(Auth::user()->is_email_verified == 1 && Auth::user()->is_access_allowed == 1 && Auth::user()->is_admin == 1)
        {
            return $next($request);
        }
        else{
            return redirect('/');
        }
        
    }
}
