<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Attachment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data=[
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
        
        $subs=auth()->user()->subscriptions()->active()->first();
        
        if (!is_null($subs) && $subs->count()>0) {
            $plan=Plan::select('name','description','pictures','social_links','social_limit')->where('stripe_plan',$subs->stripe_plan)->first();
            
            $data["plan"]=$plan;
        }
        /* dd($data['social'][0]); */
        return view('web.account.dashboard',compact('data'));

    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            'f_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $user=User::findOrFail(auth()->user()->id);
            $user->fill($request->all());
            $user->save();
            
            return redirect()->back()->with(array(
                'message' => 'Data saved !', 
                'alert_type' => 'success'
            ));
        } catch (\Throwable $th) {
            return redirect()->back()->with(array(
                'message' => 'Something went wrong.', 
                'alert_type' => 'error'
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
        if ($request->social && count($request->social)>0) {
            auth()->user()->social_links()->delete();
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
                    'message' => 'Data saved !', 
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

    public function fetchAttachments()
    {
        $data=[
            'images'=>auth()->user()->attachments->where('type','image'),
            'video'=>auth()->user()->attachments->where('type','video'),
            'audio'=>auth()->user()->attachments->where('type','audio')
        ];

        return view('components.attachments',compact('data'));
    }

}
