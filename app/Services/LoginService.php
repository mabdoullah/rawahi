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
            // $user = $model::find(1);
            // $user->password = bcrypt(123456789);
            // $user->save();
            $check = $model::select('email')->where('email',$email)->first();
            if(!empty($check))  return $guard;
		}
        
        return false;
    }


}
