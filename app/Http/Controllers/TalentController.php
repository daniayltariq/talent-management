<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function profile(){

    	return view('web.account.profile');

    }
}
