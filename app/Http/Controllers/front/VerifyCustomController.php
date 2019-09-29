<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Services\VerifyUserService;

class VerifyCustomController extends Controller
{
    


	public function verifyuser(VerifyUserService $VerifyUserService, $token){
		
		$verifyUser = $VerifyUserService->checkToken($token);
		
		if(empty($verifyUser)) return redirect('/'); //view('front.verify.failed_verify'); 
		
		$VerifyUserService->verifySuccess($verifyUser);

		return view('front.verify.success_verify');

	}


	public function emailNotVerified (){
		return isEmailVerified() ? redirect('/') : view('front.verify.email_not_verified');
 		
	}
	
}
