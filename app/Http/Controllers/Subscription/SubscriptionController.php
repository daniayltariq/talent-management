<?php

namespace App\Http\Controllers\Subscription;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Domain\Subscriptions\Requests\SubscriptionStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Domain\Mail\EmailOtp;

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
        /* $paymentMethods=auth()->user()->paymentMethods(); */
        return view('web.account.subscription.card.index',compact('plan'))
                /* ->with('paymentMethods', $paymentMethods) */
                ->with('intent', (new User())->createSetupIntent()/* $request->user()->createSetupIntent() */);
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

        $new_user=new \App\Models\User;
        $new_user->email=$request->card_holder_email;
        $new_user->password=Hash::make("12345678");
        $new_user->save();
        $new_user->assignRole('candidate');
        if ($new_user) {
            $res=$this->processPayment($request->paymentMethod,$request->plan,$new_user);
            if ($res =='success') {
                if (session()->has('referal') && !is_null(session('referal')) /* isset(auth()->user()->referrer_id) */) 
                {
                    /* $user=\App\Models\User::findOrFail(auth()->user()->referrer_id); */
                    $referal=\App\Models\Referal::where('refer_code',session('referal')/* $user->referal_code->refer_code */)->first(); 
                    if ($referal) 
                    {
                        $referal->points+=1;
                        $referal->save();
                    }
                }
                /* return redirect()->route('account.talent.detail') //old flow
                                ->with('success', 'Thanks for becoming a subscriber'); */
                Auth::login($new_user);
                return redirect()->route('account.signup')
                                ->with('success', 'Thanks for becoming a subscriber');
            }

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

    public function sendOtp(Request $request)
    {
        /* dd($request->all()); */
        
        //first validate email if it is already taken
        /* try { */
            $user=\App\Models\User::where('email',$request->email)->first();
            if ($user) {
                $data=array(
                    "status"=>'error',
                    "message"=>'email already taken'
                );
            }
            else{
                $six_digit_random_number = mt_rand(100000, 999999);
                Cookie::queue(Cookie::make('otp', $six_digit_random_number,5));

                $data=[
                    "otp"=>$six_digit_random_number,
                ];
                Mail::to($request->email)->send(new EmailOtp($data));
                Cookie::queue(Cookie::make('otp_tries', 3,5));

                $data=array(
                    "status"=>'success',
                    "message"=>'Verification sent'
                );
            }
            
            return $data;

        /* } catch (\Throwable $th) {
            return 'error';
        } */
    }

    public function verifyOtp(Request $request)
    {
        /* dd($request->all()); */
        
        $value = Cookie::get('otp');
        $tries = Cookie::get('otp_tries');
        if ($tries <= 0) {
            Cookie::queue(Cookie::make('otp_tries', $tries-1,5));
            $data=array(
                "status"=>'error',
                "message"=>'Verification code attempts exceeded.',
                "tries"=>$tries-1
            );
        }
        elseif($value=='' || is_null($value)){
            Cookie::queue(Cookie::make('otp_tries', $tries-1,5));
            $data=array(
                "status"=>'error',
                "message"=>'Verification code has expired please reload!',
                "tries"=>$tries-1
            );
        }
        elseif ($request->otp == $value) {
            $data=array(
                "status"=>'success',
                "message"=>'Verification success.'
            );
        }
        else{
            Cookie::queue(Cookie::make('otp_tries', $tries-1,5));
            $data=array(
                "status"=>'error',
                "message"=>'Verification code is incorrect. Please try again',
                "tries"=>$tries-1
            );
        }
        return $data;

    }
}
