<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
       
        return view('web.index');
    } 

    public function findtalent()
    {
        return view('web.forms.find-talent');
    }

   


    public function models()
    {
         $notification = array(
    'message' => 'I am a successful message!', 
    'alert-type' => 'success'
);
        return redirect('/')->with($notification);
    }

}
