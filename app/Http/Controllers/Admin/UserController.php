<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;

use App\Domain\Mail\InviteTalent;
use App\Domain\Mail\DeactivateUser;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::whereHas(
            'roles', function($q){
                $q->where('name','<>','superadmin');
            }
        )->with('roles')->get();
        $roles=Role::where('name','<>','superadmin')->get();
        
        /* dd($user[0]->roles[0]->name); */
        return view('backend.user.list',compact('user','roles'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countries=DB::table('countries')->select('nicename')->get();
        $roles=Role::where('name','<>','superadmin')->get();
        return view('backend.user.create',compact('roles','countries'));
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
        $validator = Validator::make($request->all(),[
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'h_adress_1' => ['string', 'max:255','required'],
            'h_adress_2' => ['max:255'],
            'zipcode' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string'],
        ]);
        
        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            /* return 'error'; */
        }

        $country_data=json_decode($request->new_phone,true);
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' =>Str::of($request->phone)->prepend('+'.$country_data->dialCode),
            'phone_c_data'=>$request->new_phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'h_adress_1' => $request->h_adress_1,
            'h_adress_2' => $request->h_adress_2,
            'zipcode' => $request->zipcode,
        ]);
        $user->save();

        $user->assignRole($request->account_type);
        
        return redirect()->back()->with("status", "User has been Created.");
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

    public function assignRole(Request $request)
    {
        $user=User::findOrFail($request->user_id);
        if ($user) {
            $role=Role::where('id',$request->role_id)->first();
            if ($role) {
                $user->removeRole($user->roles[0]->name);
                $user->assignRole($role->name);
                return redirect()->back()->with("status", "Role has been Updated.");
            }
        }

    }

    public function updateStatus(Request $request)
    {
        $status=array(1,0);
        if ($request['user_id'] && in_array($request['status'],$status)) {
            $user=User::findOrFail($request['user_id']);
            $user->status=$request['status'];
            
            if ($user) {
                try {
                    $data=[
                        "user"=>$user,
                    ];
                    if ($request['status'] == 0) {
                        Mail::to($user->email) ->cc(['admin@thetalentdepot.com'])->send(new DeactivateUser($data));
                    }
                    
                    $user->save();
                    $status="success";
                    
                } catch (\Throwable $th) {
                    
                    $status="error";
                }
                
            }
            else{
                $status="error";
            }
            return $status;
        }
        
    }

    public function markFeatured(Request $request)
    {
        $status=array(1,0);
        if ($request['user_id'] && in_array($request['feature_status'],$status)) {
            $user=User::findOrFail($request['user_id']);
            $user->featured=$request['feature_status'];
            $user->save();
            if ($user) {
                $status="success";
            }
            else{
                $status="error";
            }
        }
        else{
            $status="error";
        }
        return $status;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::findOrFail($id);
        $skills=\App\Models\Skill::all();
        $roles=Role::where('name','<>','superadmin')->get();
        return view('backend.user.edit',compact('user','roles','skills'));
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
        /* dd($request->all()); */
        $validator = Validator::make($request->all(),[
            'gender'  => 'required|string',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'dob' => 'required|date',
            'country' => 'required|string',
            'hairs' => 'required|string',
            'eyes' => 'required|string',
            "skills"    => "required|array",
            "skills.*"  => "required|string|distinct",
            'password'  => 'string|nullable',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user =User::findOrFail($id);
        $user->fill($request->all());
        $user->save();

        $user->profile->fill($request->all());
        $user->profile->save();

        if ($request->skills) {
            $user->skills()->delete();
            foreach($request->skills as $skill){
                $skills[] = ['candidate_id' => $user->id,'skill_id' => $skill];
            }
            \App\Models\CandidateSkill::insert($skills);
        }
        
        return redirect()->back()->with("status", "User has been Updated.");
    }

    public function inviteUser(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            "user_id"    => "required|integer",
            "subject"    => "required|string",
            "message"    => "required|string",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user=User::findOrFail($request->user_id);
        
        try {
            $data=[
                "subject"=>$request->subject,
                "message"=>$request->message,
            ];
            
            Mail::to($user->email)->send(new InviteTalent($data));
            return redirect()->back()->with('success', 'Invitation Sent.');
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->with('error', 'Something went wrong.');
        }
         
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

    public function impersonate($id)
    {
        $user=User::findOrFail($id);
        \Auth::user()->impersonate($user);

        return redirect()->back()->with("status", "User Impersonated.");
    }
}
