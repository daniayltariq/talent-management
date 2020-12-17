<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use \Stripe\Plan as StripePlan;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* dd(123); */
        $plans=Plan::all();
        return view('backend.plan.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */
        $plan = new Plan;
        /* dd($plan->getFillable()); */
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string', 'max:191'],
            'cost' => ['required', 'numeric'],
            'pictures' => ['required', 'integer'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $plan->fill($request->all());
        if ($request->social_links==1) {
            $plan->social_limit=$request->social_limit;
        }

        if ($request->community_access==1) {
            $plan->community_access_perm=$request->community_access_perm;
        }
        $plan->slug=Str::snake($request->name);

        \Stripe\Stripe::setApiKey(\Config::get('app.STRIPE_SECRET'));
        $stripe_plan=StripePlan::create(array(
            "amount" => currencyToCent($request->cost),
            "interval" => 'year',
            "product" => array(
                "name" => $request->name
            ),
            "currency" => "usd")
        );
        /* dd($stripe_plan); */
        if (isset($stripe_plan->id)) {
            $plan->stripe_plan=$stripe_plan->id;
            $plan->save();
            if ($plan) {
                return redirect()->back()->with('success', 'Plan created successfully !');
            }
            else{
                return redirect()->back()->with('error', 'something went wrong !');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request,$slug)
    {
        $plan=Plan::where('slug',$slug)->first();
        return view('web.pages.plans.show', compact('plan'))->with('intent', $request->user()->createSetupIntent());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit($plan)
    {
        $plan=Plan::where('id',$plan)->orWhere('slug',$plan)->first();
    
        if ($plan) {
            return view('backend.plan.create',compact('plan'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        /* dd($request->all()); */
        $plan=Plan::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string', 'max:191'],
            'cost' => ['required', 'numeric'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        /* $prop=$plan->getFillable();
        array_push($prop,'_token');
        $features=$request->except($prop); */

        $plan->fill($request->all());
        if ($request->social_links==1) {
            $plan->social_limit=is_null($request->social_limit)?'unlimited':$request->social_limit;
        }

        if ($request->community_access==1) {
            $plan->community_access_perm=$request->community_access_perm;
        }
        $plan->slug=Str::snake($request->name);
        /* $plan->features=$features; */

        $stripe = new \Stripe\StripeClient(\Config::get('app.STRIPE_SECRET'));

        $stripe_plan=$stripe->plans->update(
            $plan->stripe_plan,
            [
                'metadata' =>[
                    "amount" => currencyToCent($request->cost),
                    "interval" => 'year',
                    "currency" => "usd"
                ]
            ]
        );

        if (isset($stripe_plan->id)) {

            $stripe_prod=$stripe->products->update(
                $stripe_plan->product,
                ['metadata' => ["name" => $request->name]]
            );

            if ($stripe_prod) {
                $plan->stripe_plan=$stripe_plan->id;
                $plan->save();
                if ($plan) {
                    return redirect()->back()->with('success', 'Plan updated successfully !');
                }
                else{
                    return redirect()->back()->with('error', 'something went wrong !');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy( $plan)
    {
        $plan=Plan::findOrFail($plan);
        /* dd($plan); */
        if ($plan) {
            $plan->delete();
            return redirect()->back()->with('success', 'Plan deleted successfully !');
        }
    }
}
