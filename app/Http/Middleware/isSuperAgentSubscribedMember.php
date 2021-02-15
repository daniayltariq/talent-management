<?php

namespace App\Http\Middleware;

use Closure;

class isSuperAgentSubscribedMember
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
            if (auth()->user()->hasAnyRole("agent|superadmin") || (auth()->user()->hasRole('candidate') && auth()->user()->hasSubscription()) ) {
               return $next($request);
            } 
            
        }

        return redirect()->route('denial')->with(array(
            'message' => 'Access Denied', 
            'alert-type' => 'error'
        ));
    }
}
