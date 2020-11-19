<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Referal;

class ReferalController extends Controller
{
    public function index()
    {
        $referal_exists=auth()->user()->referal_code;
        if($referal_exists){
            $code=$referal_exists->refer_code;
        }
        else{
            $referal=new Referal;
            $referal->user_id=auth()->user()->id;
            $code= unique_string('referal','refer_code', 20);

            $referal->refer_code=$code;
            $referal->save();
        }

        $code=url('/').'/register/?referal='.$code;
        return $code;

    }

    public function store(Request $request)
    {
        

    }

    public function detail()
    {
        $profile=auth()->user()->profile;
    	return view('web.account.detail',compact('profile'));

    }
}
