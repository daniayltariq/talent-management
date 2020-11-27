<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('web.index');
    } 


    public function findtalent()
    {
      $members=\App\Models\User::whereHas(
         'roles', function($q){
             $q->whereNotIn('name',['superadmin','agent']);
         }
      )->with('profile')->get();
      /* dd($members); */
      return view('web.forms.find-talent',compact('members'));
    }
  
    public function models()
    {
         $notification = array(
        'message' => 'I am a successful message!', 
        'alert-type' => 'success'
        );
        
        // return redirect('models')->with($notification);
        return view('web.pages.models');
    }
  

    public function modelsgrid()
    {    
       return view('web.pages.models-grid');
    }

    public function modelsingle($id)
    { 
      $user=\App\Models\User::findOrFail($id);
      if ($user->attachments()->exists()) {
         $data=[
            'profile'=>$user->profile,
            'images'=>$user->attachments->where('type','image'),
            'video'=>$user->attachments->where('type','video'),
            'audio'=>$user->attachments->where('type','audio')
         ];

         return view('web.pages.models-single',compact('data'));
      }
      else{
         return view('web.errors.404')->with('text','Please add attachments to your Profile');
      }
      
    }

    public function community()
    {    
       return view('web.pages.community');
    }

    public function magzine()
    {    
       return view('web.pages.magzine');
    } 

    public function magzinesingle()
    {    
       return view('web.pages.magzine-single');
    } 

    public function findproductions()
    {    
       return view('web.pages.find-productions');
    }

    public function singleproduction()
    {    
       return view('web.pages.production-single');
    }

    public function applyproduction()
    {    
       return view('web.forms.apply');
    }



}
