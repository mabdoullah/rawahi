<?php
namespace App\Services;

use App\VerifyUser;
use App\Mail\VerifyMail;
use Mail;
class VerifyUserService{
    
    public function __construct(){
        
    }

    public static function verify($user){
       
        //dd($user);

        VerifyUser::where('user_id',$user->id)->where('guard',$user->getGuard())->delete();

         $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time()),
            'guard' => $user->getGuard()
          ]);
        // dd($user->verifyUser);


         Mail::to($user->email)->send(new VerifyMail($user));
    }



    public function getUserByToken($token){
        $VerifyUser = VerifyUser::where('token',$token)->first();
        return !empty($VerifyUser) ? $VerifyUser : false;


    }


}
