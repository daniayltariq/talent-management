<?php

namespace App\Http\Controllers\Account\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
/* use App\Domain\Account\Mail\Subscription\CardUpdated; */
use App\Models\Plan;

class SubscriptionCardController extends Controller
{
    /**
     * Show update card form.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('account.subscription.card.index');
    }

    public function store(Request $request)
    {
        $request->user()->updateCard($request->token);

        // send email
        Mail::to($request->user())->send(new CardUpdated());

        return redirect()->route('account.index')
            ->withSuccess('Your card has been updated.');
    }

    public function newSubscription(Plan $plan,Request $request)
    {
        /* dd($plan); */
        $paymentMethods=auth()->user()->paymentMethods();
        return view('web.account.subscription.card.index',compact('plan'))
                ->with('paymentMethods', $paymentMethods)
                ->with('intent', $request->user()->createSetupIntent());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPaymentMethod(Request $request)
    {
        /* return $request->payment_id; */
        if(\Auth::check())
        {
            $owner=\App\User::findOrFail(auth()->user()->farm->owner_id);
            $paymentMethod = $owner->findPaymentMethod($request->payment_id);
            /* dd($paymentMethod->id); */
            if ($paymentMethod) {

                if ($request->q && $request->q=='upgrade') {
                    $res=$this->processPayment($paymentMethod->id,$request->plan,$owner);
                } else {
                    $res=$this->swipePlan($paymentMethod->id,$request->plan,$owner);
                }
                
                if ($res=='success') {
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
}
