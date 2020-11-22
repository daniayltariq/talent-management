<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {

        return view('web.account.dashboard');

    }

    public function store(Request $request)
    {
        /* dd($request->all()); */
        $validator = Validator::make($request->all(), [
            'f_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
        ]);
        
        if ($validator->fails()) {
            $request->session()->flash('error', 'Something went wrong !');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $user=User::findOrFail(auth()->user()->id);
            $user->fill($request->all());
            $user->save();
            
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
