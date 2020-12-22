<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicCategory;
use App\Models\TopicComment;
use App\Models\TopicLike;
use Illuminate\Http\Request;
use App\Models\Plan;

class CommunityController extends Controller
{
    public function index(Request $request)
    {
        /* dd($request->all()); */
        if ($request->query('category') && $request->category == 'all') {

            $data = Topic::where('status',1)->with('user')->paginate(10);
            
            return view('web.pages.single-topic',compact('data'));
        }

    	$community = TopicCategory::where('status',1)->with(['topics' => function($q){
    		return $q->with('user')->limit(4);
    	}])->withCount(['topics','comments','likes'])->withSum('topics','views')->paginate(5);

    	return view('web.pages.community',compact('community'));

    }

    public function single($slug)
    {
    	$data = Topic::where('slug',$slug)->with('user')->with('comments.user')->withCount('likes')->first();
        $data->views =  $data->views + 1;
        $data->save();

        $latest=Topic::where('status',1)->latest()->get()->take(4);
        
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
    	})->where('status',1)->with('user')->paginate(10);

    	if($data){
    		return view('web.pages.single-topic',compact('data','category'));
    	}
    }

     public function post_like(Request $request)
     {
        $subs=auth()->user()->subscriptions()->active()->first();
        if ($subs->count()>0) {
            $plan=Plan::select('community_access','community_access_perm')->where('stripe_plan',$subs->stripe_plan)->first();
            if ($plan->community_access==1 && $plan->community_access_perm=='R/W') {
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
        }
        return array(
            'message' => 'Access Denied', 
            'alert_type' => 'error'
        );

    }

    public function post_comment(Request $request)
    {
        $request->all();
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
        /* dd(123); */
        return redirect()->back()->with([
            "message" => "Comment has been posted.",
            "alert-type" => "success",
        ]);

    }

    public function read_more_comments(Request $request)
    {
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
        $posts=Topic::where('status',1)->where('title','LIKE','%'.$request->q.'%')
                ->orWhere('content','LIKE','%'.$request->q.'%')
                ->get();
        return view('web.components.post-suggestion',compact('posts'));
    }

}
