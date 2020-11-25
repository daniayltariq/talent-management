<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attachment;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $data=[
            'images'=>auth()->user()->attachments->where('type','image'),
            'video'=>auth()->user()->attachments->where('type','video'),
            'audio'=>auth()->user()->attachments->where('type','audio')
        ];
        /* dd($data); */
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
        /* dd($request->hasFile('file')); */
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

}
