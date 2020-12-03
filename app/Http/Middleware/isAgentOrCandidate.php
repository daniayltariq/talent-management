<?php

namespace App\Http\Middleware;

use Closure;

class isAgentOrCandidate
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
        if(\Auth::check()){ 
            if( \Auth::user()->hasRole("agent") || \Auth::user()->hasRole("candidate") ){
                return $next($request);
            }
        }else{
            $request->session()->put('url.intended', url()->previous());
            return redirect()->route('login');
        }
    }
}
