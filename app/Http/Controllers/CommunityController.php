<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicCategory;
use App\Models\TopicComment;
use App\Models\TopicLike;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        /* dd($request->all()); */
        if ($request->query('category') && $request->category == 'all') {

            $data = Topic::with('user')->paginate(10);
            
            return view('web.pages.single-topic',compact('data'));
        }

    	$community = TopicCategory::with(['topics' => function($q){
    		return $q->with('user')->limit(4);
    	}])->withCount(['topics','comments','likes'])->withSum('topics','views')->paginate(5);

    	return view('web.pages.community',compact('community'));

    }

    public function single($slug)
    {
    	$data = Topic::where('slug',$slug)->with('user')->with('comments.user')->withCount('likes')->first();
        $data->views =  $data->views + 1;
        $data->save();

        $latest=Topic::latest()->get()->take(4);
        
        $comments = TopicComment::where('topic_id',$data->id)->where('parent_id',null)->with('childComment')->get()->take(1);
        /* dD($comments); */
    	if($data){
    		return view('web.pages.single-post',compact('data','comments','latest'));
    	}
    	 
    }

    public function categories($slug)
    {

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

    public function post_comment(Request $request)
    {

        if($request->topic_id){

            $new = new TopicComment;

            $new->topic_id = $request->topic_id;
            $new->user_id  =  auth()->user()->id;
            
            $new->comment   = $request->comment;

            if ($request->parent_comment && $request->topic_id) {
                $new->parent_id = $request->parent_comment;
            }

            $new->save();
        }

        return redirect()->back()->with([
            "message" => "Comment has been posted.",
            "alert-type" => "success",
        ]);

    }

    public function read_more_comments(Request $request)
    {
        /* return $request->all(); */
        $comments = TopicComment::where('topic_id',$request->topic)->where('parent_id',null)->with('childComment')->get()->skip($request->skipcount)->take(1);
        if($comments){
    		return view('web.components.comments',compact('comments'));
    	}
    }

    /**
     * Suggestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_suggest(Request $request)
    {
        $posts=Topic::where('title','LIKE','%'.$request->q.'%')
                ->orWhere('content','LIKE','%'.$request->q.'%')
                ->get();
        return view('web.components.post-suggestion',compact('posts'));
    }

}
