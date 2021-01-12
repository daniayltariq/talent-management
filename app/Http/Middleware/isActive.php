<?php

namespace App\Http\Middleware;

use Closure;

class isActive
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
        if(\Auth::check() && \Auth::user()->status==1 ){
            
            return $next($request);
        }else{
            return redirect()->route('denial')->with(array(
                'message' => 'Account is Inactive', 
                'alert-type' => 'error'
            ));
        }
    }
}
