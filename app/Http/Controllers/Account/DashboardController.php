<?php

namespace App\Http\Controllers\Account;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\File;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data=[
            'profile'=>auth()->user()->profile,
            'images'=>auth()->user()->attachments->where('type','image'),
            'video'=>auth()->user()->attachments->where('type','video'),
            'audio'=>auth()->user()->attachments->where('type','audio'),
            'social'=>auth()->user()->social_links()->select('source','link')->get()->toArray()
        ];

        if ($request->query('q') && $request->query('q')=='fetch_limit') {
            $limit=[
                'image_limit'=>count($data['images']),
                'video_limit'=>count($data['video']),
                'audio_limit'=> count($data['audio'])
            ];
            return $limit;
        }
        
        $subs = auth()->user()->subscriptions()->active()->first();
        
        if (!is_null($subs) && $subs->count()>0) {
            $plan = Plan::select('name','description','pictures','audios','videos','social_links','social_limit','unique_url')->where('stripe_plan',$subs->stripe_plan)->first();
            
            $data["plan"] = $plan;
        }

        $custom_url = $plan->unique_url == 1?true:false;

        // dd($custom_url, $plan->unique_url, $plan);

        return view('web.account.dashboard',compact('data','custom_url'));

    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            'f_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable','string', 'min:8','confirmed'],
            'gender' => ['required','string'],
            'custom_gender' => ['required_if:gender,=,custom','string'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $country_data=json_decode($request->new_phone,true);
           
            $user=User::findOrFail(auth()->user()->id);
            $user->fill(is_null($request->password)?$request->except(['password','dob']):$request->all());
            if($request->date_){
                $user->dob=$request->date_['year'].'-'.$request->date_['month'].'-'.$request->date_['day'];
            }
            
            $user->phone=Str::of($request->phone)->prepend('+'.$country_data['dialCode']);
            $user->phone_c_data=$request->new_phone;
            if (!is_null($request->password)) {
                $user->password=Hash::make($request->password);
            }

            // store gender
            $user->gender = $request->gender;
            $user->custom_gender = $request->custom_gender;
            $user->save();
            
            return redirect()->back()->with(array(
                'message' => 'Successfully updated', 
                'alert-type' => 'success'
            ));
            
        } catch (\Throwable $th) {
            return redirect()->back()->with(array(
                'message' => 'Something went wrong.', 
                'alert-type' => 'error'
            ));
        }
        
    }

    public function storeMedia(Request $request)
    {
        /* $file = new File($request->file('file'));
        dd($file); */
        if ($request->hasFile('file') || $request->file('file')) {
            $img = custom_file_upload($request->file('file'),'public','uploads/uploadData',null,null,null,null);
            
            $attach=new Attachment;
            $attach->user_id=auth()->user()->id;
            $attach->type=$request->type;
            $attach->file=$img;
            $attach->save();
            $notify=array('name'=>$img,'original_name' => $request->file('file')->getClientOriginalName());
        }
        else{
            $notify=array('name'=>null,'original_name' => null);
        }
        return response()->json($notify);
    }
    
    public function social_links(Request $request)
    {
        /* dd($request->social); */
        $validator= Validator::make($request->all(), [
            "social"    => "required|array",
            "social.*"  => "required|array",
            "social.*.source"  => "required|string",
            "social.*.link"  => "required|string",
        ]);

        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        /* dd($request->social); */
        if (auth()->user()->social_links()->exists()) {
            auth()->user()->social_links()->delete();
        }
            
        if (!is_null($request->social) && count($request->social)>0) {
            foreach($request->social as $key =>$link)
            {
                $social=new \App\Models\SocialLink;
                $social->user_id=auth()->user()->id;
                $social->source=$link['source'];
                $social->link=$link['link'];
                $social->save();
            }
            if ($social) {
                return redirect()->back()->with(array(
                    'message' => 'Successfully Saved !', 
                    'alert_type' => 'success'
                ));
            }
        }
        
        return redirect()->back()->with(array(
            'message' => 'Something went wrong.', 
            'alert_type' => 'error'
        ));
        
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Attachment::where('file',$filename)->delete();
        $path=storage_path('app/public/uploads/uploadData/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    public function fetchAttachments(Request $request)
    {
        $data=[
            'images'=>auth()->user()->attachments->where('type','image'),
            'video'=>auth()->user()->attachments->where('type','video'),
            'audio'=>auth()->user()->attachments->where('type','audio')
        ];
        
        $subs = auth()->user()->subscriptions()->active()->first();
        
        if (!is_null($subs) && $subs->count()>0) {
            $plan = Plan::select('name','description','pictures','audios','videos','social_links','social_limit','unique_url')->where('stripe_plan',$subs->stripe_plan)->first();
            
            $data["plan"] = $plan;
        }

        $media_key=$request->media_key;
        if ($media_key=='image') {
            return view('components.attachments',compact('data'));
        }
        elseif($media_key=='audio'){
            return view('components.audios',compact('data'));
        }
        elseif($media_key=='video'){
            return view('components.videos',compact('data'));
        }
        
    }

    public function resume()
    {
        $profile=auth()->user()->profile;
        return view('print.resume',compact('profile'));
    }

    public function signup()
    {
        $countries=DB::table('countries')->select('nicename')->get();
        return view('web.account.signup', compact('countries'));
    }

}
