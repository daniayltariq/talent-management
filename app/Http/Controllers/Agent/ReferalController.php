<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Referal;
use App\Services\FPService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReferalController extends Controller
{
    public function index()
    {
        $referal_exists=auth()->user()->referal_code;
        if($referal_exists){
            $code=$referal_exists->refer_code;
        }
        else{
            $referal=new Referal;
            $referal->user_id=auth()->user()->id;
            $code= strtolower(unique_string('referal','refer_code', 20));

            $referal->refer_code=$code;
            $referal->save();

            // add referal to first promotor
            $first_promoter = FPService::createPromotor(auth()->user()->email,$code);
            if($first_promoter){
                auth()->user()->first_promoter_id = $first_promoter['id'];
            }
        }

        $code=url('/').'/register/?referal='.$code;
        return $code;

    }

    public function store(Request $request)
    {
        

    }

    public function detail()
    {
        $profile=auth()->user()->profile;
    	return view('web.account.detail',compact('profile'));

    }

    public function reward()
    {
        if (auth()->user()->referal_code && auth()->user()->referal_code->points > 1)
        {
            // Check if file exists in app/storage/file folder
            $file_path = public_path().'/uploads/reward/book.pdf';
            /* echo($file_path); */
            if (file_exists($file_path))
            {
                /* return 123; */
                // Send Download
                return Response::download($file_path, 'book.pdf', [
                    'Content-Length: '. filesize($file_path)
                ]);
            }
            else
            {
                // Error
                exit('Requested file does not exist on our server!');
            }
        }
        return redirect()->back()->with([
            "message" => "Permission denied.",
            "alert-type" => "error",
        ]);
        
    }
}
