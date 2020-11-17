<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class TopicController extends Controller
{

	public static function topics($data = []){

		$data['no_paginate'] = $data['no_paginate'] ?? false;
		$data['paginate_number'] = $data['paginate_number'] ?? 10;

		$data = new Topic;
        $data->with('category')->where('allow_agent',1);
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
        $blog=Topic::findOrFail($id);
        $categories = self::topic_categories(['no_paginate' => true]);
        //dd($blog->tags->pluck('tag')->toArray());
        
        return view('backend.topic.create',compact('categories','blog'));
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
