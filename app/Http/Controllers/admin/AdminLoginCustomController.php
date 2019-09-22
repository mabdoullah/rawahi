<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use App\Services\VerifyUserService;

use Auth;

class AdminLoginCustomController extends Controller
{
    
	public function login(){
		return view('admin.login.login');
	}

	public function dologin(Request $request){

		$validator = Validator::make($request->all(), 
              ['email'=> 'required|email','password'=>'required'])
			  ->validate();
			  
		
		
		$check = Admin::select('email')->where('email',$request->email)->first();
		if(empty($check)){
			session()->flash('custom_error','البريد الإلكترونى غير مسجل');
			return redirect()->back()->withInput();
		}
		
		$rememberme = request('rememberme') == 1 ? true :false;
	
		if(Auth::guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
		 	return redirect( 'admin/' );
		 }else{
		 	session()->flash('custom_error','كلمة المرور غير صحيحة');
		 	return redirect()->back()->withInput();
		}

	}

	public function logout(){
		Auth::guard('admin')->logout();
		return (request()->segment(1) == 'admin') ? redirect('admin/login') : redirect('/');
		
	}



}
