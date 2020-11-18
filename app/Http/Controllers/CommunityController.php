<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicCategory;
use App\Models\TopicComment;
use App\Models\TopicLike;
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

    	$data = Topic::where('slug',$slug)->with('user')->with('comments.user')->withCount('likes')->first();
        $data->views =  $data->views + 1;
        $data->save();
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

     public function post_like(Request $request){

        if($request->topic_id){
            $res_liked = 0;
            $post = TopicLike::where('topic_id',$request->topic_id)->where('user_id',auth()->user()->id)->first();

            if($post){
                $post->delete();
            }else{
                $post = new TopicLike;
                $res_liked = 1;
                $post->topic_id = $request->topic_id;
                $post->user_id  = auth()->user()->id;
                $post->save();
            }

            $post_likes = TopicLike::where('topic_id',$request->topic_id)->get()->count();
            return view('web.components.post_likes')->with(['post_id' => $post->topic_id,'post_likes' => $post_likes]);
 
        }

    }

    public function post_comment(Request $request){

        if($request->topic_id){

            $new = new TopicComment;

            $new->topic_id = $request->topic_id;
            $new->user_id  =  auth()->user()->id;
            
            $new->comment   = $request->comment;
            $new->parent_id = $request->parent_id;

            $new->save();
        }

        return redirect()->back()->with([
            "message" => "Comment has been posted.",
            "alert-type" => "success",
        ]);

    }

}
