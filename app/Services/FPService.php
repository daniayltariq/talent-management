<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FPService{

	protected static $api_key = '4a2cda022c723e6e239fdac3adb3dd73';

	public static function trackSigup($email,$ref_id){
		
		$response = Http::withHeaders([
			'x-api-key' => self::$api_key
		])->post('https://firstpromoter.com/api/v1/track/signup', [
		    'email' => $email,
		    'ref_id' => $ref_id,
		]);

	

	}

}