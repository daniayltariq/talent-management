<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;

use App\Models\Picklist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PicklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $picklist=Picklist::paginate(5);
        return view('web.agent.picklist',compact('picklist'));
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
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:50'],
            'description' => ['string', 'max:191'],
            'member_id' => ['required', 'numeric'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->picklist_id) {
            $picklist = \App\Models\Picklist::findOrFail($request->picklist_id);
        } else {
            $picklist = new \App\Models\Picklist;
            $picklist->title=$request->title;
            $picklist->description=$request->description;
            $picklist->user_id=auth()->user()->id;
            $picklist->save();
        }
        

        $picklist_item= new \App\Models\PicklistUser;
        $picklist_item->picklist_id=$picklist->id;
        $picklist_item->user_id=$request->member_id;
        $picklist_item->save();

        if ($picklist_item) {
            return redirect()->back()->with('success', 'Plan created successfully !');
        }
        else{
            return redirect()->back()->with('error', 'something went wrong !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request,Picklist $picklist)
    {
        /* dd($picklist); */
        return view('web.agent.picklist-single',compact('picklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit($plan)
    {
       
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
