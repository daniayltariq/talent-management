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
        dd(json_decode($request->skills,true));
        /* return $request->all(); */
        /* try { */
            $req=json_decode($request->params,true);
            $profile=$req['method']=='PUT' ? Profile::findOrFail($req['profile_id']) : new Profile;
            $profile->fill($req);
            $profile->user_id=auth()->user()->id;
            $profile->save();


            if (isset($req['experience[']) ) {
                /* auth()->user()->experience()->delete(); */
                foreach($req['experience['] as $exp){
                    $experience[] = ['candidate_id' => auth()->user()->id,'type' => $req['type'],'name' => $exp['name'],'role' => $exp['role'],'production' => $exp['production']];
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

            if (isset($request->profile_img)) {
                $destinationPath = 'uploads/products';
                $img = custom_file_upload($request->profile_img,'public',$destinationPath,null,null,null,null);

                $profile->profile_img=$img;
                $profile->save();
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

    public function detail()
    {
        $profile=auth()->user()->profile;
    	return view('web.account.detail',compact('profile'));

    }
}
