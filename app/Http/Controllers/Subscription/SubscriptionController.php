<?php

namespace App\Http\Controllers\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Domain\Subscriptions\Requests\SubscriptionStoreRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan,Request $request)
    {
        // $user = Auth::user();
        /* dd(444); */
        $paymentMethods=auth()->user()->paymentMethods();
        return view('web.account.subscription.card.index',compact('plan'))
                ->with('paymentMethods', $paymentMethods)
                ->with('intent', $request->user()->createSetupIntent());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $subscription = $request->user()->newSubscription('main', $request->plan);

        if($request->has('coupon')) {
            $subscription->withCoupon($request->coupon);
        }
        */
        /* dd($request->all()); */
        $res=$this->processPayment($request->paymentMethod,$request->plan,auth()->user());
        if ($res =='success') {
            return redirect()->route('account.talent.detail')->with('success', 'Thanks for becoming a subscriber');
        }

        return redirect()->back()->with('error','Something went wrong.');
    }

    /**
     * process stripe payment.
     *
     * @return \Illuminate\Http\Response
     */
    public static function processPayment($payment_id,$plan,$owner)
    {
        $stripeCustomer = $owner->createOrGetStripeCustomer();
        $plan = Plan::findOrFail($plan);
        
        /* return $user_subs=$user->subscriptions; */
        if ($stripeCustomer && $plan) 
        {
            $res=$owner
            ->newSubscription($plan->slug, $plan->stripe_plan)
            ->create($payment_id);

            if ($owner->subscribed($plan->slug)) {
                return 'success';
            }
            else{
                return 'error';
            }
        }
    }
}
