<?php
namespace App\Services;

use App\VerifyUser;
use App\Mail\VerifyMail;

class VerifyUserService{
    
    public function __construct(){
        
    }

    public static function createUser($user,$user_type){
       
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time()),
            'user_type' => $user_type
          ]);


        dd($user->verifyUser->token);


          //\Mail::to($user->email)->send(new VerifyMail($user));


    }
}
