<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function profile()
    {
    	return view('web.account.profile');

    }

    public function store(Request $request)
    {
        dd($request->all());
    	return view('web.account.profile');

    }

    public function detail(){

    	return view('web.account.detail');

    }
}
