<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Domain\Mail\ContactTalent;

class DashboardController extends Controller
{
	public function dashboard(){

		return view('backend.index');

	}
	public function mailTalent(Request $request)
	{
		/* dd($request->all()); */
		$rules = [
			'recipient' => ['required','email'],
            'subj' => ['required','string', 'max:191'],
            'message' => ['required','string', 'max:255'],
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()
					->withErrors($validator)
					->withInput();
		}
		
		try {

			$data=[
				"subj"=>$request->recipient,
				"message"=>$request->message,
			];
            Mail::to($request->recipient)->send(new ContactTalent($data));

            return redirect()->back()->with(array(
                'message' => 'Data saved !', 
                'alert_type' => 'success'
            ));
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(array(
                'message' => 'Something went wrong.', 
                'alert_type' => 'error'
            ));
        }
	}
}
