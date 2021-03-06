<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;
use App\Models\TopicComment;
use Illuminate\Http\Request;
use App\Models\TopicCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{

	public static function topics($data = []){

		$data['no_paginate'] = $data['no_paginate'] ?? false;
		$data['paginate_number'] = $data['paginate_number'] ?? 10;

		$data = new Topic;
        $data->with('category');
		if($data['no_paginate']){
			     return $data->get();
		}

        return $data->paginate($data['paginate_number']);
	}

    public static function topic_categories($data = []){

        $data['no_paginate'] = $data['no_paginate'] ?? false;
        $data['paginate_number'] = $data['paginate_number'] ?? 10;

        $data = new TopicCategory;
        $data->with('category');
        if($data['no_paginate']){
                 return $data->get();
        }

        return $data->paginate($data['paginate_number']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
        $blog =  self::topics();
        if ($request->ajax()) {
            return $blog;
        } else {
            return view('backend.topic.list',compact('blog'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $categories = self::topic_categories(['no_paginate' => true]);

        return view('backend.topic.create',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic_category_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            /* 'meta_title' => ['required', 'string', 'max:191'], */
            'slug' => ['required', 'string','unique:topics,slug'],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $blog = new Topic;
        $destinationPath = 'uploads/'; $filename = null; $path_filename = null;
        $req = $request->all();
        $req['content'] = $request->content;
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $destinationPath = 'uploads/' . $request->page;
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess = $file->move($destinationPath, $filename);
            $path_filename = 'uploads/'. $request->page . '/' .$filename;

            $req['image'] = $path_filename;

        }

        //$req = collect($req);
        $blog->user_id=auth()->user()->id;
        $blog->fill($req);
        $blog->save();

        // $tags = $request->blog_tags;

        // if($tags){
        //     $tags = explode(",",$tags);
        //     $blog_tags = array();

        //     foreach($tags as $tag){
        //         $blog_tags[] = ['tag' => $tag,'blog_id' => $blog->id];
        //     }
        //     \App\Tag::insert($blog_tags);
        // }

         
        
        return redirect()->back()->with("status", "Topic has been created.");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog=Topic::where('slug',$slug)->orWhere('id',$slug)->first();
        if ($blog) {
            return view('backend.topic.show',compact('blog'));
        }
        else{
            return redirect()->back()->with("error", "Topic not found.");
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
        $blog=Topic::findOrFail($id);
        $categories = self::topic_categories(['no_paginate' => true]);
        //dd($blog->tags->pluck('tag')->toArray());
        
        return view('backend.topic.create',compact('categories','blog'));
    }

    public function comments(Request $request)
    {
        $topic=Topic::where('id',$request->topic_id)->first();
        if ($topic) {
            $comments=$topic->comments->where('approved',0);
            return view('backend.topic.comments',compact('comments'));
        } else {
            return 'error';
        }
        
    }

    public function approveComment(Request $request)
    {
        $comm=TopicComment::where('id',$request->comm_id)->first();
        if ($comm) {
            $comm->approved=1;
            $comm->save();
            if($comm){
                return 'success';
            }else{
                return 'error';
            }
        } else {
            return 'error';
        }
        
    }

    public function updateStatus(Request $request)
    {
        $status=array(1,0);
        if ($request['topic_id'] && in_array($request['status'],$status)) {
            $topic=Topic::findOrFail($request['topic_id']);
            $topic->status=$request['status'];
            $topic->save();
            if ($topic) {
                $data=[
                    "status"=>"success",
                    "blog_status"=>$topic->status==1?0:1
                ];
                $status="success";
            }
            else{
                $data=[
                    "status"=>"error",
                    "blog_status"=>$topic->status
                ];
            }
            return $data;
        }
        
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
        $validator = Validator::make($request->all(), [
            'topic_category_id' => ['required', 'numeric'],
            'title' => ['required', 'string'],
            /* 'meta_title' => ['required', 'string', 'max:191'], */
            'slug' => ['required', 'string','unique:topics,slug,'.$id],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $blog = Topic::findOrFail($id);
        $destinationPath = 'uploads/'; $filename = null; $path_filename = null;
        $req = $request->all();
        $req['content'] = $request->content;
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $destinationPath = 'uploads/' . $request->page;
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess = $file->move($destinationPath, $filename);
            $path_filename = 'uploads/'. $request->page . '/' .$filename;

            $req['image'] = $path_filename;

        }

        //$req = collect($req);
        $blog->user_id=auth()->user()->id;
        $blog->fill($req);
        $blog->save();

        return redirect()->back()->with("status", "Topic has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic=Topic::findOrFail($id);
        if ($topic) {
            $topic->delete();
            return redirect()->back()->with("success", "topic deleted.");
        }
        return redirect()->back()->with("error", "Something went wrong.");
    }
}
