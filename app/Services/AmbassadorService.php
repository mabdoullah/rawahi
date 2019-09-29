<?php
namespace App\Services;

use App\Mail\AmbassadorGeneratedIdMail;
use Mail;
use App\Ambassador;
class AmbassadorService{
    
    public function __construct(){
        
    }

    public static function sendGeneratedIdMail($ambassadorID){

        $ambassador = Ambassador::find($ambassadorID);
        
        //dd($ambassador->email);
        
        if(!empty($ambassador)){
            Mail::to($ambassador->email)->send(new AmbassadorGeneratedIdMail($ambassador));
        }
        
    }



}
