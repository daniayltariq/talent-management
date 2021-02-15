<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('guest'); */
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {

        // if($request->query('_go')){
        //   $request->cookie();
        // }

        $countries=DB::table('countries')->select('nicename')->get();
        
        /* return view('auth.register', compact('countries')); */ // old register view
        if (session()->has('minor')) {
            return view('auth.registerPricing', compact('countries'));
        }
        else{

            return redirect()->route('how-it-works');
        }
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /* dd($data); */
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'account_type' => ['required', 'string', 'in:candidate,agent'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /* dd($data); */
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        if (/* isset($data['referal']) */ session()->has('referal') && !is_null(session('referal'))) 
        {
            $referal=\App\Models\Referal::where('refer_code',session('referal'))->first(); 
            if ($referal) 
            {
                $user->referrer_id=$referal->user_id;
                $user->save();

                /* $referal->points=$referal->points+1;
                $referal->save(); */

            }
        }
        /* $user->assignRole($data['account_type']); */
        session()->forget('referal');
        return $user;
    }

    protected function registered(Request $request, $user)
    { 

 
        if(\Auth::check() && auth()->user()->hasRole('candidate')) {
            return redirect()->route('account.talent.profile');
            // return redirect()->route('superadmin.home');
        } elseif(\Auth::check() && auth()->user()->hasRole('agent')) {
            return redirect()->route('/');
        }
    }

    /**
     * New Signup Candidate Form.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function candidateSignup(Request $request)
    {
        /* dd($request->all()); */
        $validator= Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'guardian' => ['required', 'string', 'in:guardian,member'],
            'g_f_name' => ['nullable', 'string', 'max:255'],
            'g_l_name' => ['nullable', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            /* 'g_day' => ['nullable', 'string', 'max:10'],
            'g_month' => ['nullable', 'string', 'max:10'],
            'g_year' => ['nullable', 'string', 'max:10'], */
            "g_date_"    => "nullable|array|min:3",
            "g_date_.*"  => "nullable|string",
            'g_phone' => ['nullable', 'max:255','unique:users,g_phone,'.auth()->user()->id],
            'g_landline' => ['nullable', 'max:255','unique:users,g_landline,'.auth()->user()->id],
            'g_country' => ['nullable', 'string', 'max:255'],
            'g_city' => ['nullable', 'string', 'max:255'],
            'g_state' => ['nullable', 'string', 'max:255'],
            /* 'g_h_adress_1' => ['string', 'max:255','nullable'],
            'h_adress_1' => ['string', 'max:255','nullable'], */
            /* 'dob' => ['date_format:Y-m-d','before:'.date('Y-m-d')], */
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            /* 'day' => ['required', 'string', 'max:10'],
            'month' => ['required', 'string', 'max:10'],
            'year' => ['required', 'string', 'max:10'], */
            "date_"    => "required|array|min:3",
            "date_.*"  => "required|string",
            'phone' => ['required', 'max:255','unique:users,phone,'.auth()->user()->id],
            'landline' => ['nullable', 'max:255','unique:users,landline,'.auth()->user()->id],
            /* 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], */
            'ethnicity' => ['required', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'union' => ['required', 'string', 'max:255'],
            'passport' => ['required', 'string', 'max:255'],
            'driver_license' => ['required', 'string', 'max:255'],
            'user_agreement'=>['required'],
            'license_agreement'=>['required']
        ]);

        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        /* dd($request->all()); */
        $country_data=json_decode($request['new_phone'],true);
        if ($request['g_new_phone'] && !is_null($request['g_new_phone'])) {
           $g_country_data=json_decode($request['g_new_phone'],true);
        }
        
        $user = User::findOrFail(auth()->user()->id);
        $user->password = Hash::make($request['password']);
          $user->guardian= !is_null($request['guardian']) ? 1 : 0;
          $user->g_f_name= $request['g_f_name']?? null;
          $user->g_l_name= $request['g_l_name']?? null;
          $user->gender= $request['gender']?? null;
          $user->custom_gender= $request['custom_gender']?? null;
          $user->g_dob= isset($request->g_date_['year'], $request->g_date_['month'], $request->g_date_['day']) ? ($request->g_date_['year'].'-'.$request->g_date_['month'].'-'.$request->g_date_['day']) : null;
          $user->g_phone=!is_null($request['g_new_phone']) ? Str::of($request['g_phone'])->prepend('+'.$g_country_data['dialCode']) : null;
          $user->g_phone_c_data=$request['g_new_phone']?? null;
          $user->g_landline=$request['g_landline']?? null;
          $user->g_country= $request['g_country']?? null;
          $user->g_city= $request['g_city']?? null;
          $user->g_state= $request['g_state']?? null;
          /* $user->g_h_adress_1 = !is_null($request['g_h_adress_1']) ? $request['g_h_adress_1'] : null; */
            /* 'dob= $request['dob']; */
          $user->f_name= $request['f_name'];
          $user->l_name= $request['l_name'];
          $user->dob= $request->date_['year'].'-'.$request->date_['month'].'-'.$request->date_['day'];
          $user->phone=Str::of($request['phone'])->prepend('+'.$country_data['dialCode']);
          $user->phone_c_data=$request['new_phone'];
          $user->landline=$request['landline'];
          $user->country= /* $request['country'] */"United States";
          $user->city= $request['city'];
          $user->state= $request['state'];
          /* $user->h_adress_1= $request['h_adress_1']?? null; */
          $user->ethnicity= $request['ethnicity'];
          $user->union= $request['union'];
          $user->passport= $request['passport'];
          $user->driver_license= $request['driver_license'];
        $user->save();

        $profile = new Profile ;
        $profile->user_id=$user->id;
        $profile->custom_link=self::getCustomUrl($user);
        $profile->save();

        return redirect()->route('account.dashboard');
    }

    private static function getCustomUrl($user)
    {
        $suggestions=array(
            $user->f_name.'-'.$user->l_name,
            $user->f_name[0].'-'.$user->l_name,
            $user->f_name.'-'.$user->l_name[0],
            $user->f_name.''.$user->l_name,
            $user->f_name[0].''.$user->l_name
        );

        foreach ($suggestions as $key => $suggestion) {
            
            $profile=Profile::where('custom_link',$suggestion)->first();

            if ($profile && $profile->user_id !==auth()->user()->id) {
                if ($key == (count($suggestions)-1)) {
                    for($i=0;$i<2;){
                        $suggest_update=$suggestions[0].rand(1,100);
                        $profile=Profile::where('custom_link',$suggest_update)->first();
                        if ($profile) {
                            
                        }else{
                            $link=$suggest_update;
                            break;
                        }
                    }
                }
                else{
                    continue;
                }
                
            }
            else{
                $link=$suggestion;
                break;
            }
        }

        return $link;
    } 

}
