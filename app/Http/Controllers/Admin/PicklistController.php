<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;

use App\Models\Picklist;
use Illuminate\Support\Str;
use App\Models\PicklistUser;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use App\Domain\Mail\SharePicklist;
use App\Domain\Mail\PicklistTalent;
use NotificationChannels\ClickSend;
use App\Http\Controllers\Controller;
/* use Nexmo\Laravel\Facade\Nexmo; */

use Illuminate\Support\Facades\Mail;
use App\Notifications\ClickSendNotify;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notification;
use NotificationChannels\ClickSend\ClickSendChannel;
use NotificationChannels\ClickSend\ClickSendMessage;

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
                $q->whereNotIn('name',['candidate','superadmin']);
            }
        )->where('status',1)->get();
        /* dd($picklist[0]->items_data('phone')); */
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
            'name' => ['string','nullable', 'max:50'],
            'description' => ['string','nullable', 'max:191'],
            'picklist_id' => ['required', 'numeric'],
        ];

        if ($request->picklist_id) {
            $rules['member_id'] = ['integer','unique:picklist_user,user_id,NULL,id,picklist_id,'.$request->picklist_id];
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
        $validator = Validator::make($request->all(), [
            "recipients"    => "required|array",
            "recipients.*"  => "required|string|distinct",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $picklist=Picklist::findOrFail($id);
        
        try {
            $recp=$request->recipients;
            
            foreach ($recp as $key => $email) {
                Mail::to($email)->send(new SharePicklist($picklist));
            }

            return redirect()->back()->with('success', 'Picklist Shared.');
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         
    }

    public function text_talent(Request $request,$id)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            "talent_recipients"    => "required|string",
            "message"    => "required|string",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $picklist=Picklist::findOrFail($id);
        
        try {
            if ($request->source && $request->source=='text') {

                $recp=$request->talent_recipients;
                $recp=explode(',',$recp);
                /* dd('text'); */
                foreach ($recp as $key => $phone) {
                    $user = User::where('phone',$phone)->first();
                    if ($user) {
                        $content=[
                            "message"=>$request->message,
                            "from_user"=>auth()->user(),
                            "to_user"=>$user
                        ];
                        $user->notify(new ClickSendNotify($content));
                    } else {
                        continue;
                    }
                    
                    /* Nexmo::message()->send([
                        'to'   => $phone,
                        'from' => '16105552344',
                        'text' => $request->message
                    ]); */
                    
                }
            }
            elseif ($request->source && $request->source=='email') {
                $recp=$request->talent_recipients;
                $recp=explode(',',$recp);
                
                $data=[
                    "subject"=>$request->mail_subject,
                    "message"=>$request->message,
                ];
                /* dd($recp); */
                foreach ($recp as $key => $email) {
                    Mail::to($email)->send(new PicklistTalent($data));
                }
            }

            return redirect()->back()->with('success', 'Success.');
            
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
