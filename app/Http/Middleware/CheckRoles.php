<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$rols)
    {
        if( auth()->user()->hasRoles( $rols ) )
        {
            return $next($request);
        }
        return redirect('/');
    }
}
