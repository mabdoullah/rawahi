<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

// use App\Mail\AdminResetPassword;
// use DB;
// use Carbon\Carbon;
// use Mail;
use Validator;
use App\Services\LoginService;
use Auth;
class LoginCustomController extends Controller
{
    
	public function login(){
		
		return view('front.login.login');

	}

	public function dologin(Request $request , LoginService $LoginService){

		
		$validator = Validator::make($request->all(), 
              ['email'=> 'required|email','password'=>'required'])
			  ->validate();
			  
		
		$guard = $LoginService->getGuard($request->email);
		
		if(empty($guard)){
			session()->flash('custom_error','البريد الإلكترونى غير مسجل');
			return redirect()->back()->withInput();
		}

		// dd($guard);
		
		$rememberme = request('rememberme') == 1 ? true :false;
	
		if(Auth::guard($guard)->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
		 	return redirect( ($guard == 'admin') ? 'admin' : '/' );
		 }else{
		 	session()->flash('custom_error','كلمة المرور غير صحيحة');
		 	return redirect()->back()->withInput();
		}

	}

	public function logout(){
		$guards = array_keys(config('auth.guards'));
		foreach ($guards as $guard) {
		  if(Auth::guard($guard)->check()){
				Auth::guard($guard)->logout();
		  } 
		}

		

		return (request()->segment(1) == 'admin') ? redirect('admin/login') : redirect('/');
		
	}

	
	// public function forget_password(){
	// 	return view('admin.layouts.forget_password');
	// }

	// public function send_forget_password(){
		
	// 	$messages = [
    // 		'email.required'=> 'You should add your email address',
    // 		'email.email'=>'add the correct email address'
	// 	];
	// 	$this->validate(request(),['email'=>'required|email'],[],$messages);

	// 	$admin = \App\Admin\Admin::where('email',request('email'))->first();

	// 	if(!empty($admin)){
	// 		$token = app('auth.password.broker')->createToken($admin);	
	// 		$data = DB::table('password_resets')->insert([
	// 			'email'=>$admin->email,
	// 			'token'=>$token,
	// 			'created_at' => Carbon::now()
	// 		]);
	// 		Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin , 'token'=>$token]));
	// 		//return new AdminResetPassword(['data'=>$admin,'token'=>$token]);
	// 		session()->flash('success_sent','We sent an email to '.$admin->email);
	// 		return back();
	// 	}else{
	// 		session()->flash('email_not_found','email not found');
	// 		return redirect(admin_url('forget/password'));
	// 	}
		



	// }


	// public function reset_password($token){
	// 	$check_token=DB::table('password_resets')->where('token',$token)
	// 	->where('created_at','>',Carbon::now()->subHours(2))->first();
	// 	if(!empty($check_token)){
	// 		return view('admin.layouts.reset_password' , ['data'=>$check_token]);	
	// 	}else{
	// 		return redirect(admin_url('forget/password'));
	// 	}
	// }

	
	// public function change_reset_password($token){
	// 	$this->validate(request(),[
	// 		'email'=>'required|email',
	// 		'password'=>'required|confirmed',
	// 		'password_confirmation'=>'required'
	// 	]);

		
	// 	$check_token=DB::table('password_resets')->where('token',$token)
	// 	->where('created_at','>',Carbon::now()->subHours(2))->first();
	// 	if(!empty($check_token)){
	// 		$admin= \App\Admin\Admin::where('email',$check_token->email)
	// 		->update(['password'=>bcrypt(request('password')) , 'remember_token'=>'']);

	// 		DB::table('password_resets')->where('email',$check_token->email)->where('token',$token)->delete();
	// 		admin()->attempt(['email'=>$check_token->email,'password'=>request('password')],true);
	// 		return redirect(admin_url());
	// 	}else{
	// 		return redirect(admin_url('forget/password'));
	// 	}
			
	// }
	

}