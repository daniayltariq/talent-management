<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FPService{

	protected static $base_url_api = 'https://firstpromoter.com/api/v1';

	protected static $api_key = '4a2cda022c723e6e239fdac3adb3dd73';

	public static function trackSigup($email,$ref_id){
		
		try {
			$response = Http::withHeaders([
				'x-api-key' => self::$api_key
			])->post(self::$base_url_api.'/track/signup', [
			    'email' => $email,
			    'ref_id' => $ref_id,
			]);
			
			$response =  $response->body();

			if(is_array($response) && array_key_exists('id', $response)){
				return $response;
			}
		} catch (Exception $e) {
			
		}

		return false;
		
	}

	public static function createPromotor($email,$ref_id = null){
		
		

		try {
			$response = Http::withHeaders([
				'x-api-key' => self::$api_key
			])->post(self::$base_url_api.'/promoters/create', [
			    'email' => $email,
			    'ref_id' => $ref_id,
			]);

			$response =  $response->body();

			if(is_array($response) && array_key_exists('id', $response)){
				return $response;
			}
		} catch (Exception $e) {
			
		}

		return false;
 
	}

}