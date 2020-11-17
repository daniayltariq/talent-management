<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(){

    	$community = TopicCategory::with(['topics' => function($q){
    		return $q->with('user')->limit(3);
    	}])->withCount('topics')->paginate(5);

    	return view('web.pages.community',compact('community'));

    }

    public function single($slug){

    	$data = Topic::where('slug',$slug)->with('user')->first();
    	if($data){
    		return view('web.pages.single-post',compact('data'));
    	}
    	 
    }

    public function categories($slug){

		$category = TopicCategory::where('slug',$slug)->first();

    	$data = Topic::whereHas('category',function($q) use ($slug){
    		$q->where('slug',$slug);
    	})->with('user')->paginate(10);

    	if($data){
    		return view('web.pages.single-topic',compact('data','category'));
    	}
    	 
    }

}
