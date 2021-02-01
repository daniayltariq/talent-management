<?php

namespace App\Http\Controllers\Agent;
use App\Http\Controllers\Controller;

use App\Models\Picklist;
use App\Models\PicklistUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
/* use Nexmo\Laravel\Facade\Nexmo; */

use App\Notifications\ClickSendNotify;
use NotificationChannels\ClickSend;
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
        $picklist=Picklist::where('user_id',auth()->user()->id)->withCount(['items' => function ($q) {
            $q->whereHas('member', function ($qq) {
                $qq->has('profile');
            });
        }])->paginate(5);
        
        /* dd($picklist[0] ); */
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
            'name' => ['nullable','string', 'max:50'],
            'description' => ['nullable','string', 'max:191'],
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
            return redirect()->back()->with(array(
                'message' => 'Picklist saved !', 
                'alert-type' => 'success'
            ));
        }
        else{
            return redirect()->back()->with(array(
                'message' => 'Something went wrong.', 
                'alert-type' => 'error'
            ));
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
        
        return view('web.agent.picklist-single',compact('picklist','items'));
    }

    public function sendText(Request $request)
    {
        /* dd($request->all()); */
        if($request->recipient=='all_talents')
        {
            $talents=PicklistUser::where('picklist_id',$request->picklist_id)->get();
            try {
                foreach ($talents as $key => $talent) {
                    $user = User::find($talent->member->id);
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
                        'to'   => $talent->member->phone,
                        'from' => '16105552344',
                        'text' => $request->message
                    ]); */
                }

                $status=array(
                    'message' => 'message sent !', 
                    'alert-type' => 'success'
                );
                
            } catch (\Throwable $th) {
                $status=array(
                    'message' => 'Something went wrong.', 
                    'alert-type' => 'error'
                );
                
            }
        }
        else{
            try {
                $user = User::where('phone',$request->recipient)->first();
                if ($user) {
                    $content=[
                        "message"=>$request->message,
                        "from_user"=>auth()->user(),
                        "to_user"=>$user
                    ];
                    $user->notify(new ClickSendNotify($content));
                } 
                /* Nexmo::message()->send([
                    'to'   => $request->recipient,
                    'from' => '16105552344',
                    'text' => $request->message
                ]); */

                $status=array(
                    'message' => 'message sent !', 
                    'alert-type' => 'success'
                );
            } catch (\Throwable $th) {
                $status=array(
                    'message' => 'Something went wrong.', 
                    'alert-type' => 'error'
                );
            }
            
        }

        return redirect()->back()->with($status);
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
    public function delete_picklist( Request $request,$id)
    {
        $picklist=Picklist::findOrFail($id);
        /* dd($picklist); */
        if ($picklist && $picklist->user_id == auth()->user()->id) {
            $picklist->delete();
            return redirect()->back()->with('success', 'picklist deleted successfully !');
        }
    }

    public function delete_picklist_user( Request $request,$id)
    {
        $member=PicklistUser::findOrFail($id);
        /* dd($picklist); */
        if ($member) {
            $member->delete();
            return redirect()->back()->with('success', 'member removed successfully !');
        }
    }
}
