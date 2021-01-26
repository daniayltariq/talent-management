<?php

namespace App\Http\Middleware;

use Closure;

class hasNoData
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
        if(\Auth::check() && \Auth::user()->hasNoData() ){
            return $next($request);
        }
        return redirect()->route('/')->with(array(
            'message' => 'User already Signed', 
            'alert-type' => 'warning'
        ));
    }
}
