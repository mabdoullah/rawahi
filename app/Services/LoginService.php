<?php
namespace App\Services;


class LoginService{

    public function __construct(){
        
    }

    public function getGuard($email){

        
        $guardsAuthArray = config('auth.guards');
        
        unset($guardsAuthArray['api']);
    
        $providers = config('auth.providers');
        

		foreach ($guardsAuthArray as $guard => $value) {
            $model = $providers[$value['provider']]['model'];
            $check = $model::select('email')->where('email',$email)->first();
            if(!empty($check))  return $guard;
		}
        
        return false;
    }


}
