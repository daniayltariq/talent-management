<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as httpRequest;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session()->put('url.intended', url()->current());
        $this->middleware('guest')->except('logout');
    }

    public function authenticated()
    {
        /* dd(auth()->user()); */
        if (Auth::check() && \Auth::user()->hasRole('superadmin')) {
            return redirect()->route('backend.dashboard');
        } elseif(Auth::check() && \Auth::user()->hasRole('agent')) {
            /* dd(session('url.intended')); */
            return redirect()->to(session('url.intended'));
        } elseif(Auth::check() && auth()->user()->hasRole('candidate')) {
            /* return redirect()->route('account.talent.profile'); */
            dd(session('url.intended'));
            return redirect()->to(session('url.intended'));
        }
        
    }

    public function logout(Request $request) 
    {
      Auth::logout();
      return redirect('/login');
    }
}
