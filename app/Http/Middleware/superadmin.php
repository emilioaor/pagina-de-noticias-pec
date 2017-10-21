<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class superadmin
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
        
        if(Auth::check() && Auth::user()->nivel == 'Administrador' )
            return $next($request);
        else
            return redirect('admin/noticias');
    }
}
