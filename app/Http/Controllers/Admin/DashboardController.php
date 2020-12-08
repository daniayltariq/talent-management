<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SavedSearch;

class DashboardController extends Controller
{
	public function dashboard(){

		return view('backend.index');

	}

	
	public function saveSearch(Request $request)
	{
		if(session('old_query')){
			$search=new SavedSearch;
			$search->name=$request->title;
			$search->value=json_encode(session('old_query'));
			$search->save();
			return redirect()->back()->with([
				"message" => "Search Saved",
				"alert-type" => "success",
			]);
		}
		else{
			return redirect()->back()->with([
				"message" => "Something went wrong",
				"alert-type" => "error",
			]);
		}
		
	}
}
