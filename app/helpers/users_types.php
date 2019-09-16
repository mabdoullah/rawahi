<?php

    
    function userIfLogin($guard){
        return auth()->guard($guard)->user();
    }

    function adminUser()
    {
        return userIfLogin('admin');
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
		  if(auth()->guard($guard)->check()){
			return userIfLogin($guard);
		  } 
        }
        
    }


?>