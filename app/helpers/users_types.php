<?php

    
    function guardsWithoutAdmin(){
        $guards = config('auth.guards');
        unset($guards['admin']);
        unset($guards['api']);
        return array_keys($guards);
    }


    
    function userIfLogin($guard){
        return 
        (auth()->guard($guard)->check())
        ? 
            auth()->guard($guard)->user() 
        :
          false
        ;
    }

    function adminUser()
    {
        return userIfLogin('admin');
    }
    function agentUser()
    {
        return userIfLogin('agent');
    }
    function embassadorUser()
    {
        return userIfLogin('embassador');
    }
    function partnerUser()
    {
        return userIfLogin('partner');
    }
    function user()
    {
        return userIfLogin('user');
    }

    function currentUser(){
        $guards = guardsWithoutAdmin();

		foreach ($guards as $guard) {
          if(userIfLogin($guard)){
              return userIfLogin($guard);
          }
        }

        return false;
        
    }


?>