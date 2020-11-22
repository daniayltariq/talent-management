<?php

namespace App\Http\Controllers\Account\Subscription;

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
    public function index()
    {
        // $user = Auth::user();
        /* dd(123); */
        return view('subscriptions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriptionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionStoreRequest $request)
    {
        dd(123);
        $subscription = $request->user()->newSubscription('main', $request->plan);
        // $user = User::find(1);

        // $subscription = $request->user()->newSubscription('main', 'premium')->create($paymentMethod);

        if($request->has('coupon')) {
            $subscription->withCoupon($request->coupon);
        }

        $subscription->create($request->token);

        return redirect()->route('account.dashboard')->withSuccess('Thanks for becoming a subscriber.');
    }

    public function getPaymentMethod(Request $request)
    {
        /* return $request->payment_id; */
        if(\Auth::check())
        {
            /* $owner=\App\User::findOrFail(auth()->user()->farm->owner_id); */
            $paymentMethod = auth()->user()->findPaymentMethod($request->payment_id);
            /* dd($paymentMethod->id); */
            if ($paymentMethod) {

                if ($request->q && $request->q=='upgrade') {
                    $res=$this->swipePlan($paymentMethod->id,$request->plan,auth()->user());
                } else {
                    $res=$this->processPayment($paymentMethod->id,$request->plan,auth()->user());
                }
                
                if ($res=='success') {
                    if (isset(auth()->user()->referrer_id)) 
                    {
                        $user=\App\Models\User::findOrFail(auth()->user()->referrer_id);
                        $referal=\App\Models\Referal::where('refer_code',$user->referal_code->refer_code)->first(); 
                        if ($referal) 
                        {
                            $referal->points+=1;
                            $referal->save();
                        }
                    }
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Payment Processed successfully!',
                        'data'=>$res,
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Payment Processing failed!',
                    ]);
                }
                
            }

            return response()->json([
                'status' => 'error',
                'message' => 'No Payment Method found!',
            ]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
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
