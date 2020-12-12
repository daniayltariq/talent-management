<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\UserRequest;

use App\Models\User;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userRequest(Request $request)
    {
        $requests=UserRequest::all()/* where('accepted',0)->get() */;
        /* dd($user[0]->roles[0]->name); */
        return view('backend.user.user_requests',compact('requests'));
        
    }

    public function acceptRequest(Request $request,$id)
    {
        $user=User::findOrFail($request->user_id);
        $req=UserRequest::findOrFail($id);
        if ($user && $req) {
            $req->accepted=1;
            $req->save();
            if ($req) {
                return redirect()->back()->with("success", "Request Accepted.");
            }
            else{
                return redirect()->back()->with("error", "Something went wrong");
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function deleteRequest($id)
    {
        $req=UserRequest::findOrFail($id);
        $req->delete();
        return redirect()->back()->with("success", "request deleted.");
    }

}
