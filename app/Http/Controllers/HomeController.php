<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Skill;
use App\Models\Topic;
use App\Search\TalentSearch;

use Illuminate\Http\Request;

/* use App\Notifications\ClickSendTest;
use NotificationChannels\ClickSend;
use Illuminate\Notifications\Notification;
use NotificationChannels\ClickSend\ClickSendChannel;
use NotificationChannels\ClickSend\ClickSendMessage; */

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

      /* $client = app(ClickSend\ClickSendApi::class)->getClient();
      $account =  $client->sendSms()->createInboundSms();
      $countries =  $client->getCountries()->getCountries();

      dd(collect($account)); */
      $models=\App\Models\User::whereHas(
         'roles', function($q){
             $q->whereNotIn('name',['superadmin','agent']);
         }
      )->with('profile')->get();

      $topics=Topic::where('status',1)->latest()->get()->take(3);
      
      return view('web.index',compact('models','topics'));
    } 

    public function featured_talents()
    {
      $featured=\App\Models\User::whereHas(
         'roles', function($q){
             $q->whereNotIn('name',['superadmin','agent']);
         }
      )->with('profile')->where('status',1)->where('featured',1)->get();

      return view('web.pages.talents',compact('featured'));
    }

    public function findtalent()
    {
      $members=\App\Models\User::whereHas(
         'roles', function($q){
             $q->whereNotIn('name',['superadmin','agent']);
         }
      )->with('profile')->get();
      $skills=Skill::all();
      /* dd($members); */

      session()->forget('old_query');
      return view('web.forms.find-talent',compact('members','skills'));
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

         $subs=$user->subscriptions()->active()->first();
         
         if ($subs->count()>0) {
            $plan=Plan::select('name','description','agent_contact')->where('stripe_plan',$subs->stripe_plan)->first();
            
            $data["plan"]=$plan;
         }

         return view('web.pages.models-single',compact('data'));
      }
      else{
         return view('web.errors.404')->with('text','Profile not setup yet, What needs to do here ?');
      }
      
    }

   public function searchTalent(Request $request)
   {    
      /* dd( $request->all()); */
      $skills=Skill::all();
      if($request->query()){
         $members=TalentSearch::apply($request);
         /* dd( $members); */
         return view('web.forms.find-talent',compact('members','skills'));
      }
   }

   public function testimonials()
   {
      $test=\App\Models\Testimonial::where('status',1)->get();
      /* dd($test); */
      return view('web.pages.testimonials',compact('test'));
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
