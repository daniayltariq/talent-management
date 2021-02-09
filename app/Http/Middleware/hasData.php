<?php

namespace App\Http\Middleware;

use Closure;

class hasData
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
        if(\Auth::check() && \Auth::user()->hasData() ){
            return $next($request);
        }
        return redirect()->route('account.signup')->with(array(
            'message' => 'Sign up required', 
            'alert-type' => 'warning'
        ));
    }
}
