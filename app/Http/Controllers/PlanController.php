<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* dd($request->all()); */
        session()->put('minor',$request->minor);
        $plans=Plan::orderBy('cost','asc')->get();
        return view('web.pages.pricing',compact('plans'));
    }

}
