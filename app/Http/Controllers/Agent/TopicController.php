<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\TopicCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{

	public static function topics($data = []){

		$data['no_paginate'] = $data['no_paginate'] ?? false;
        $data['paginate_number'] = $data['paginate_number'] ?? 10;

		$topics = new Topic;
        $topics = $topics->with('category')->withCount('comments')->where('user_id',auth()->user()->id);

		if($data['no_paginate']){
			return $topics->get();
		}

        return $topics->paginate($data['paginate_number']);
	}

    public static function topic_categories($data = []){

        $data['no_paginate'] = $data['no_paginate'] ?? false;
        $data['paginate_number'] = $data['paginate_number'] ?? 10;

        $data = new TopicCategory;
        $data->where('allow_agent',1);

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
 
       $topics =  self::topics();
        if ($request->ajax()) {
            return $topics;
        } else {
            return view('web.agent.topic.list',compact('topics'));
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

        return view('web.agent.topic.create',compact('categories'));
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
            'title' => ['required', 'string'],
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
        $req['topic_category_id'] = 2;
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

        return redirect()->back()->with([
            "message" => "Pending approval.",
            "alert-type" => "success",
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $portfolio = Portfolio::where('slug',$slug)->first();
        if ($portfolio) {
            return view('backend.portfolio.show',compact('portfolio'));
        }
        else{
            return 'error';
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
        $blog = Topic::findOrFail($id);
        $categories = self::topic_categories(['no_paginate' => true]);
        //dd($blog->tags->pluck('tag')->toArray());
        
        return view('web.agent.topic.create',compact('categories','blog'));
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

        $blog = Topic::findOrFail($id);
        
        $destinationPath = 'uploads/'; $filename = null; $path_filename = null;
        $req = $request->all();
        $req['content'] = $request->content;
        $req['topic_category_id'] = 2;
        
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $destinationPath = 'uploads/blog' ;
            $f_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $f_extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $formatfilename = preg_replace('/[^\w]+/', '_', $f_name);
            $filename = date('Ymd_hisa').'_'.$formatfilename.'.'.$f_extension;
            $uploadSuccess = $file->move($destinationPath, $filename);
            $path_filename = 'uploads/blog' . '/' .$filename;

            $req['image'] = $path_filename;

        }

        //$req = collect($req);
        
        $blog->fill($req);
        $blog->save();

        return redirect()->back()->with([
            "message" => "Updated successfully.",
            "alert-type" => "success",
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }



}
