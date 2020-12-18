<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Plan;

class hasCommunityReadAccess
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
        if (\Auth::user()->hasAnyRole("agent|superadmin")) {
            return $next($request);
        }
        if(\Auth::check() && (\Auth::user()->status==1) ){
            $subs=auth()->user()->subscriptions()->active()->first();
            if ( $subs->count()>0 ) {
                $plan=Plan::select('community_access','community_access_perm')->where('stripe_plan',$subs->stripe_plan)->first();
                if ($plan->community_access==1 && ($plan->community_access_perm=='R' ||$plan->community_access_perm=='R/W') ) {
                    return $next($request);
                }
                
            }
            
        }
        return redirect()->back()->with(array(
            'message' => 'Access Denied', 
            'alert-type' => 'error'
        ));
    }
}
