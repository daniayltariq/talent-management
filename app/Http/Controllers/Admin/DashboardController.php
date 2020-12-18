<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SavedSearch;
use App\Search\TalentSearch;

use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
	public function dashboard(){

		return view('backend.index');

	}

	public function viewSaveSearch()
	{
		if (count(auth()->user()->saved_search)>0) {
			$search=auth()->user()->saved_search;
			return view('web.pages.saved_search',compact('search'));
		}
		else{
			return redirect()->back()->with([
				"message" => "No Saved Searches found",
				"alert-type" => "error",
			]);
		}
	}

	public function applySaveSearch($id)
   {
		$search=SavedSearch::findOrFail($id);
		$skills=Skill::all();
		if($search){
			session()->forget('old_query');
			$get_query=json_decode($search->value,true);
			
			$search_request = new \Illuminate\Http\Request();
			$search_request->setMethod('POST');
			$search_request->request->add($get_query);
			
			$members=TalentSearch::apply($search_request);
			/* dd( session('old_query')); */
			return view('web.forms.find-talent',compact('members','skills'));
		}
   }
	
	public function saveSearch(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'ss_title' => ['required', 'string'],
		]);

		if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
		
		if(session('old_query')){
			$search=new SavedSearch;
			$search->user_id=auth()->user()->id;
			$search->name=$request->ss_title;
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
