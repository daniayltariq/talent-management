<?php

namespace App\Http\Middleware;

use Closure;

class isAdminOrAgent
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
            if(  \Auth::user()->hasAnyRole("agent|superadmin") ){
                return $next($request);
            }
        }else{
            $request->session()->put('url.intended', url()->previous());
            return redirect()->route('login');
        }
    }
}
