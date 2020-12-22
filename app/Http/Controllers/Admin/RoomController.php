<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categories = TopicCategory::all();
        
        return view('backend.room.list',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'  => 'required|string',
            'slug' => ['required','string','unique:topic_categories,slug,NULL,id'],
        ]);
        
        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $room = new TopicCategory;
        $room->title=$request->title;
        $room->slug=$request->slug;
        
        $room->save();
        
        return redirect()->back()->with("status", "Room has been Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $status=array(1,0);
        if ($request['room_id'] && in_array($request['status'],$status)) {
            $room=TopicCategory::findOrFail($request['room_id']);
            $room->status=$request['status'];
            $room->save();
            if ($room) {
                $status="success";
            }
            else{
                $status="error";
            }
            return $status;
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room= TopicCategory::findOrFail($id);
        
        return view('backend.room.create',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'title'  => 'required|string',
            'slug' => ['required','string','unique:topic_categories,slug,'.$id.',id'],
        ]);
        
        if ($validator->fails()) {
            return $validator->errors();
            /* return redirect()->back()
                        ->withErrors($validator)
                        ->withInput(); */
            /* return 'error'; */
        }

        $room =TopicCategory::findOrFail($id);
        $room->title=$request->title;
        $room->slug=$request->slug;

        $room->save();
        
        return redirect()->back()->with("success", "Room Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

}
