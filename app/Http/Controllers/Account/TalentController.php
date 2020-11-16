<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;

class TalentController extends Controller
{
    public function profile()
    {
        $profile=auth()->user()->profile;
        $skills=Skill::all();
        
        /* dd($profile); */
    	return view('web.account.profile',compact('profile','skills'));

    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        /* return $request->all(); */
        /* try { */
            $profile=$request->params['method']=='PUT' ? Profile::findOrFail($request->params['profile_id']) : new Profile;
            $profile->fill($request->params);
            $profile->user_id=auth()->user()->id;
            $profile->save();


            if (isset($request->params['experience[']) ) {
                /* auth()->user()->experience()->delete(); */
                foreach($request->params['experience['] as $exp){
                    $experience[] = ['candidate_id' => auth()->user()->id,'type' => $request->params['type'],'name' => $exp['name'],'role' => $exp['role'],'production' => $exp['production']];
                }
                \App\Models\Experience::insert($experience);
            }

            if (isset($request->skills) ) {
                /* auth()->user()->experience()->delete(); */
                foreach($request->skills as $skill){
                    $skills[] = ['candidate_id' => auth()->user()->id,'skill_id' => $skill];
                }
                \App\Models\CandidateSkill::insert($skills);
            }

            $status = array(
                'message' => 'Data saved !', 
                'alert_type' => 'success'
            );

        /* } catch (\Throwable $th) {
            $status = array(
                'message' => 'something went wrong!', 
                'alert_type' => 'error'
            );
        } */
        
    	return $status;

    }

    public function detail(){

    	return view('web.account.detail');

    }
}
