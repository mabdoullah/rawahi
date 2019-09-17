<?php

    
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
        $guards = array_keys(config('auth.guards'));
        unset($guards['api']);
        unset($guards['admin']);

		foreach ($guards as $guard) {
          if(userIfLogin($guard)){
              return userIfLogin($guard);
          }
        }

        return false;
        
    }


?>