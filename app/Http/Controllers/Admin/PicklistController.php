<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Picklist;
use App\Models\User;
use App\Models\PicklistUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Domain\Mail\SharePicklist;

class PicklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $picklist=Picklist::where('user_id',auth()->user()->id)->get();
        $agents = User::whereHas(
            'roles', function($q){
                $q->where('name','<>','agent');
            }
        )->where('status',1)->get();
        return view('backend.picklist.list',compact('picklist','agents'));
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
        $rules = [
            'name' => ['string', 'max:50'],
            'description' => ['string', 'max:191'],
            'member_id' => ['required', 'numeric'],
        ];

        if ($request->picklist_id) {
            $rules['picklist_id'] = ['integer','unique:picklist_user,user_id,NULL,id,picklist_id,'.$request->picklist_id];
        }

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            
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
            return redirect()->back()->with([
				"message" => "Picklist Saved",
				"alert-type" => "success",
			]);
        }
        else{
            return redirect()->back()->with([
				"message" => "Something went wrong",
				"alert-type" => "error",
			]);
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
        $items=$picklist->items()->paginate(5);
        
        return view('backend.picklist.picklist_items',compact('picklist','items'));
    }

    /**
     * Show the form for delete the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function delete_picklist_item($item)
    {
        $item=PicklistUser::findOrFail($item);
        $item->delete();
        if($item){
            return redirect()->back()->with([
                "message" => "Picklist Deleted",
                "alert-type" => "success",
            ]);
        }
         
    }

    public function picklist_share(Request $request,$id)
    {
        /* dd($request->all()); */
        $picklist=Picklist::findOrFail($id);
        
        try {
            /* $recip=explode(',',$request->recipients); */
            foreach ($request->recipients as $key => $email) {
                Mail::to($email)->send(new SharePicklist($picklist));
            }

            return redirect()->back()->with('success', 'Picklist Shared.');
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         
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
    public function destroy( $picklist)
    {
        $picklist=Picklist::findOrFail($picklist);
        /* dd($picklist); */
        if ($picklist) {
            $picklist->delete();
            return redirect()->back()->with('success', 'Picklist deleted successfully !');
        }
    }
}