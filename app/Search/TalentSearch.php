<?php
namespace App\Search;
use Illuminate\Http\Request;

class TalentSearch
{
    public static function apply(Request $filters)
    {
        /* dd($filters->all()); */
        /* dd($prod_price=explode('-',$filters->prod_price)); */
        $currentquery = $filters->query();
        
        if (session()->has('old_query')) {
            $allQueries = array_merge( session('old_query'),$currentquery);
            /* dd($allQueries); */
            session()->put('old_query',$allQueries);
            /* dd(session('old_query')['farm_id']); */
        }
        else{
            session()->put('old_query',$currentquery);
        }
        /* dd(session('old_query')['prod_price']); */
        
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
            if (session()->has('old_query.name')) {
                
                /* $user->whereIn('farm_id',session('old_query')['farm_id']); */
                $names=explode(',',session('old_query')['name']);
                $user->whereHas('profile', function($q) use ($names){
                    foreach ($names as $key => $name) {
                        $q->orWhere('legal_first_name','LIKE','%'.$name.'%')
                            ->orWhere('legal_last_name','LIKE','%'.$name.'%');
                    }
                });
                        
                
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