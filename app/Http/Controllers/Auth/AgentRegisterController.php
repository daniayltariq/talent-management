<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    protected function validator(array $data)
    {
        /* dd($data); */
        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            /* 'dob' => ['date_format:Y-m-d','before:'.date('Y-m-d')], */
            'day' => ['required', 'string', 'max:10'],
            'month' => ['required', 'string', 'max:10'],
            'year' => ['required', 'string', 'max:10'],
            'phone' => ['required', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'h_adress_1' => ['string', 'max:255','required'],
            'h_adress_2' => ['max:255'],
            'zipcode' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string'],
            'user_agreement'=>['required']
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
        $country_data=json_decode($data['new_phone'],true);
        $user = User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'gender' => $data['gender'],
            /* 'dob' => $data['dob'], */
            'dob' => $data['year'].'-'.$data['month'].'-'.$data['day'],
            'phone' =>Str::of($data['phone'])->prepend('+'.$country_data['dialCode']),
            'phone_c_data'=>$data['new_phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country' => $data['country'],
            'city' => $data['city'],
            'state' => $data['state'],
            'h_adress_1' => $data['h_adress_1'],
            'h_adress_2' => $data['h_adress_2'],
            'zipcode' => $data['zipcode'],
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
        $user->assignRole($data['account_type']);
        return $user;
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
