<?php
namespace App\Search;
use Illuminate\Http\Request;
use Carbon\Carbon;
class TalentSearch
{
    public static function apply(Request $filters)
    {
        /* dd($filters->all()); */
        /* dd($prod_price=explode('-',$filters->prod_price)); */
        $currentquery = $filters->all();
        
        if (session()->has('old_query')) {
            $allQueries = array_merge( session('old_query'),$currentquery);
            /* dd($allQueries); */
            session()->put('old_query',$allQueries);
            /* dd(session('old_query')['farm_id']); */
        }
        else{
            session()->put('old_query',$currentquery);
        }
        /* dd(session('old_query')); */
        
        session()->forget('old_query._token');
        $user=(new \App\Models\User)->newQuery();
        $user->whereHas(
            'roles', function($q){
                $q->whereNotIn('name',['superadmin','agent']);
            });
        if (session('old_query')) {
            if (session()->has('old_query.sorting')) {
                if (session('old_query')['sorting']=='popularity') {
                    $user->orderBy('popularity','desc');
                } elseif (session('old_query')['sorting']=='average_rating') {
                    $user->orderBy('popularity','desc');
                }elseif (session('old_query')['sorting']=='latest') {
                    $user->orderBy('created_at','desc');
                }elseif (session('old_query')['sorting']=='price_low_to_high') {
                    $user->orderBy('regular_price','asc')->orderBy('sale_price','asc');
                }elseif (session('old_query')['sorting']=='price_high_to_low') {
                    $user->orderBy('regular_price','desc')->orderBy('sale_price','desc');
                }
                
            }
            if (session()->has('old_query.name') && session('old_query')['name'] !==null) {
                
                /* $user->whereIn('farm_id',session('old_query')['farm_id']); */
                $names=explode(',',session('old_query')['name']);
                $user->whereHas('profile', function($q) use ($names){
                    foreach ($names as $key => $name) {
                        if ($key==0)
                        {
                            $q->where('legal_first_name','LIKE','%'.$name.'%')
                                ->orWhere('legal_last_name','LIKE','%'.$name.'%');
                        }
                        else{
                            $q->orWhere('legal_first_name','LIKE','%'.$name.'%')
                            ->orWhere('legal_last_name','LIKE','%'.$name.'%');
                        }
                        
                    }
                });
                        
                
            }
            if (session()->has('old_query.new_age') && session('old_query')['new_age'] !==null) {
                
                /* $user->whereIn('farm_id',session('old_query')['farm_id']); */
                $ages=explode(';',session('old_query')['new_age']);
                $ages[0]=Carbon::now()->subYears($ages[0])->toDateString();
                $ages[1]=Carbon::now()->subYears($ages[1])->toDateString();
                /* dd($ages); */

                $user->whereBetween('dob',array_reverse($ages));
                
            }

            if (session()->has('old_query.gender')) {
                /* dd($user->get()); */
                $genders=session('old_query')['gender'];
                $user->where(function($query) use ($genders)
                {
                    foreach ($genders as $key => $gender) {
                        if ($key==0)
                        {
                            $query->where('gender',$gender);
                        }
                        else{
                            $query->orWhere('gender',$gender);
                        }
                        
                    }
                });
                /* dd($user->get()); */
            }

            if (session()->has('old_query.skills')) {
                $skills=session('old_query')['skills'];
                $user->whereHas('skills', function($q) use ($skills){
                    $q->whereIn('skill_id',$skills);
                });
            }

            if (session()->has('old_query.assets')) {
                $assets=session('old_query')['assets'];
                $user->whereHas('attachments', function($q) use ($assets){
                    foreach ($assets as $key => $asset) {
                        if ($key==0)
                        {
                            $q->where('type',$asset);
                        }
                        else{
                            $q->orWhere('type',$asset);
                        }
                        
                    }
                });
            }

            if (session()->has('old_query.location') && session('old_query')['location'] !==null) {
                /* dd($user->get()); */
                $locations=session('old_query')['location'];
                $user->where(function($query) use ($locations)
                {
                    $query->where('country','LIKE','%'.$locations.'%')
                            ->orWhere('city','LIKE','%'.$locations.'%')
                            ->orWhere('state','LIKE','%'.$locations.'%')
                            ->orWhere('h_adress_1','LIKE','%'.$locations.'%')
                            ->orWhere('h_adress_2','LIKE','%'.$locations.'%');
                });
                
            }

            if (session()->has('old_query.eye_color')) {
                /* dd($user->get()); */
                $eye_colors=session('old_query')['eye_color'];
                $user->whereHas('profile', function($q) use ($eye_colors){
                    foreach ($eye_colors as $key => $eye_color) {
                        if ($key==0)
                        {
                            $q->where('eyes',$eye_color);
                        }
                        else{
                            $q->orWhere('eyes',$eye_color);
                        }
                        
                    }
                });
                /* dd($user->get()); */
            }

            if (session()->has('old_query.hair_color')) {
                /* dd($user->get()); */
                $hair_colors=session('old_query')['hair_color'];
                $user->whereHas('profile', function($q) use ($hair_colors){
                    foreach ($hair_colors as $key => $hair_color) {
                        if ($key==0)
                        {
                            $q->where('hairs',$hair_color);
                        }
                        else{
                            $q->orWhere('hairs',$hair_color);
                        }
                        
                    }
                });
                /* dd($user->get()); */
            }

            if (session()->has('old_query.prod_price')) {
                $prod_price=explode(',',session('old_query')['prod_price']);
                $user->where('regular_price','<>',null)->Where('sale_price','<>',null)->whereBetween('regular_price',$prod_price)->orWhereBetween('sale_price',$prod_price);
                
            }
            if (session()->has('old_query.limit')) {
                $limit=array(20,50,100,200);
                if (in_array(session('old_query')['limit'],$limit)) {
                    return $user->with('images')->paginate(session('old_query')['limit']);
                }
                
            }
        }
        
        
        return $user->with('profile')->get();
    }
}