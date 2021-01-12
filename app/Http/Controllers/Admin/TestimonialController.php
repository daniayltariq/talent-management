<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{

	public static function testimonial($data = []){

		$data['no_paginate'] = $data['no_paginate'] ?? false;
		$data['paginate_number'] = $data['paginate_numb'] ?? 10;

		$test = new Testimonial;
		if($data['no_paginate']){
			     return $test->get();
		}

        return $test->paginate($data['paginate_number']);
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
 
        $testimonials =  self::testimonial();
        /* dd($testimonials); */
        if ($request->ajax()) {
            return $testimonials;
        } else {
            return view('backend.testimonial.list',compact('testimonials'));
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.testimonial.create');
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
            'name' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $test = new Testimonial;
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

        $test->fill($req);
        $test->save();
        
        return redirect()->back()->with("status", "Testimonial has been created.");
        
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
        $test=Testimonial::findOrFail($id);
        
        return view('backend.testimonial.create',compact('test'));
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
            'name' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $test = Testimonial::findOrFail($id);
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

        $test->fill($req);
        $test->save();

        return redirect()->back()->with("status", "Testimonial has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Testimonial::findOrFail($id);
        if ($test) {
            $test->delete();
            return redirect()->back()->with("success", "testimonial deleted.");
        }
        return redirect()->back()->with("error", "Something went wrong.");
    }
}
