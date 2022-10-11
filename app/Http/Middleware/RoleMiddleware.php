<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class RoleMiddleware
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
    // Tikriname ar vartotojas yra admin tipo
    if($request->user()->role == "admin") {
        return $next($request);
    } else {
        Session::flash( 'status', 'Šita prieiga negalima ' );
        return redirect('/home');
    }
}
}
