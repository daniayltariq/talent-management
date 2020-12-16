<?php

namespace App\Http\Middleware\Subscription;

use Closure;

class RedirectIfNotActive
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
        if (!auth()->check() || auth()->user()->doesNotHaveSubscription()) {
            return redirect()->route('pricing')
                    ->with(array(
                        'message' => 'You need to be subscribed to access this feature.', 
                        'alert-type' => 'warning'
                    ));
        }

        return $next($request);
    }
}
