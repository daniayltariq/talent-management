<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Skill;

use App\Models\SavedSearch;
use App\Search\TalentSearch;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
	public function profile()
	{
		return view('backend.profile.update');

	}

	public function profileUpdate(Request $request)
	{
		/* dd($request->all()); */
		$validator = Validator::make($request->all(),[
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id.',id'],
            'password' => ['nullable','string', 'min:8','confirmed'],
        ]);
        
        if ($validator->fails()) {
            return $validator->errors();
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            
		}
		/* dd($request->except(['password'])); */
		$user=User::findOrFail(auth()->user()->id);
		$user->fill(is_null($request->password)?$request->except(['password']):$request->all());
		if (!is_null($request->password)) {
			$user->password=Hash::make($request->password);
		}
		
		$user->save();

		if ($user) {
			return redirect()->back()->with("status", "Profile Updated.");
		} else {
			return redirect()->back()->with('error', 'Something went wrong.');
		}
		
		
	}

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
