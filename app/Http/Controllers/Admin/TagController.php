<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Validator;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags=Tag::all();
        /* dd($user[0]->tags[0]->name); */
        return view('backend.tag.list',compact('tags'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.user.create');
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
            'slug' => ['required', 'string', 'max:50', 'unique:tags,slug,NULL,id'],
        ]);
        
        if ($validator->fails()) {

            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $tag = new Tag;
        $tag->fill($request->all());
        $tag->save();
        return redirect()->back()->with("success", "Tag has been created.");
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
        $role=Role::where('id',$request->role_id)->first();
        $user->assignRole($role->name);
        return redirect()->back();
    }

    public function updateStatus($id)
    {
        $career=Career::findOrFail($id);
        $career->status=0;
        $career->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career= Career::findOrFail($id);
        //dd($career->tags->pluck('tag')->toArray());
        
        return view('backend.career.create',compact('categories','career'));
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
            'slug' => ['required', 'string', 'max:50', 'unique:tags,slug,'.$id.',id'],
        ]);
        
        if ($validator->fails()) {

            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $tag = Tag::findOrFail($id);
        $tag->fill($request->all());
        $tag->save();
        return redirect()->back()->with("success", "Tag has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with("success", "Tag deleted.");
    }
}
