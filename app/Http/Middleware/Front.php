<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Front
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
        if(getCustSessions() == null)
        {
            return redirect('/')->with(["danger"=>"Anda belum login!"]);
        }

        return $next($request);
    }
}
