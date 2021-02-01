<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AgentRegisterController extends Controller
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAgentForm()
    {
        session()->forget('minor');
        $countries=DB::table('countries')->select('nicename')->get();
        /* dd(session()->all()); */
        return view('auth.register', compact('countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateAgentForm(Request $request)
    {
        /* dd($request->all()); */
        $validator=  Validator::make($request->all(), [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'b_name' => ['nullable', 'string', 'max:255'],
            'about_business' => ['nullable', 'string', 'max:1000'],
            /* 'dob' => ['date_format:Y-m-d','before:'.date('Y-m-d')], */
            'landline' => ['nullable','string', 'max:12','unique:users'],
            'phone' => ['required', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'h_adress_1' => ['string', 'max:255'],
            "provider_type"    => ['required','array'],
            "provider_type.*"  => ['required','string','distinct'],
            'account_type' => ['required', 'string', 'in:agent'],
            'user_agreement'=>['required', 'string', 'in:on'],
            'license_agreement'=>['required', 'string', 'in:on']
        ]);
        
        if ($validator->fails()) {
            /* return $validator->errors(); */
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $country_data=json_decode($request['new_phone'],true);
        $user = User::create([
            'f_name' => $request['f_name'],
            'l_name' => $request['l_name'],
            'b_name' => $request['b_name'],
            'about_business' => $request['about_business'],
            'phone' =>Str::of($request['phone'])->prepend('+'.$country_data['dialCode']),
            'phone_c_data'=>$request['new_phone'],
            'landline'=>$request['landline'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'country' => $request['country'],
            'city' => $request['city'],
            'state' => $request['state'],
            'h_adress_1' => $request['h_adress_1'],
            'provider_type' => implode(';',array_filter($request->provider_type, fn($value) => (!is_null($value) && $value !== 'Other'))),
        ]);
        
        $user->save();
        if (/* isset($request['referal']) */ session()->has('referal') && !is_null(session('referal'))) 
        {
            $referal=\App\Models\Referal::where('refer_code',session('referal'))->first(); 
            if ($referal) 
            {
                $user->referrer_id=$referal->user_id;

                /* $referal->points=$referal->points+1;
                $referal->save(); */

            }
        }
        $user->assignRole($request['account_type']);
        /* dd($user); */
        if ($user) {
            return redirect()->route('/');
        }
        else{
            abort(404);
        }
        
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
        
    }

    protected function registered()
    {
        if(\Auth::check() && auth()->user()->hasRole('candidate')) {
            return redirect()->route('account.talent.profile');
            // return redirect()->route('superadmin.home');
        } elseif(\Auth::check() && auth()->user()->hasRole('agent')) {
            return redirect()->route('/');
            
        }
    }

}
