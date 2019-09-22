<?php
namespace App\Traits;

trait VerifyUserTrait{
    
    
  public function verifyUser()
  {
      return $this->hasOne('App\VerifyUser','user_id')->where('guard',$this->guard);
  }
 
  public function getGuard(){
      return $this->guard;
  }


}
