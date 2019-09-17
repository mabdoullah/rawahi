<?php
namespace App\Traits;

trait VerifyUserTrait{
    
    
  public function verifyUser()
  {
      return $this->hasOne('App\VerifyUser','user_id')->where('user_type',$this->guard);
  }
  
}
