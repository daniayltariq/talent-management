<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search\TalentSearch;

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
      $models=\App\Models\User::whereHas(
         'roles', function($q){
             $q->whereNotIn('name',['superadmin','agent']);
         }
      )->with('profile')->get();

      /* dd($models[0]->profile); */
      return view('web.index',compact('models'));
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
  
    public function models($link)
    {
      $pro=\App\Models\Profile::where('custom_link',$link)->first();
      if ($pro) {
         $user=\App\Models\User::findOrFail($pro->user_id);
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
            return view('web.errors.404')->with('text','Profile not found');
         }
      }
      abort(404);
      
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
         return view('web.errors.404')->with('text','Profile not setup yet, What needs to do here ?');
      }
      
    }

   public function searchTalent(Request $request)
   {    
      /* dd( $request->all()); */
      if($request->query()){
         $members=TalentSearch::apply($request);
         /* dd( $members); */
         return view('web.forms.find-talent',compact('members'));
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
