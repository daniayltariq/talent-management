<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;

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
        $roles=Role::where('name','<>','superadmin')->get();
        return view('backend.user.create',compact('roles'));
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
            'role_id'  => 'required|integer',
            'name'  => 'required|string',
            'email' => 'required|string',
            'password'  => 'required|string',
            'password' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return $validator->errors();
            /* return redirect()->back()
                        ->withErrors($validator)
                        ->withInput(); */
            /* return 'error'; */
        }

        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        if ($request->has('password')) {
			$user->password =  Hash::make($request->password);
		}
        $user->save();

        $role=Role::where('id',$request->role_id)->first();
        $user->assignRole($role->name);
        
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
            $user->save();
            if ($user) {
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
        $user= User::findOrFail($id);
        $skills=\App\Models\Skill::all();
        $roles=Role::where('name','<>','superadmin')->get();
        return view('backend.user.create',compact('user','roles','skills'));
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
