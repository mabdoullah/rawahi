<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use DB;


class ChangePasswordController extends Controller
{
  public function index()
  {
    return view('front.ChangePassword.index');
  }
  public function update(Request $request)
  {

    $validator = Validator::make($request->all(), [
        'old_password' => 'min:8|required',
        'new_password' => 'min:8|required_with:confirm_password|same:confirm_password',
    ]);
    if ($validator->fails()) {
        return redirect('changepassword/index')
            ->withErrors($validator)
            ->withInput()
            ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
    }
    // check if  old password matches the hash in the database
    if (Hash::check($request->old_password ,currentUser()->password)) {
      $table_name=currentUser()->getTable();
      $ckeck_password=DB::table($table_name)->where('id',currentUser()->id)->update(['password' => bcrypt($request->new_password)]);
      if($ckeck_password){
        return redirect('changepassword/index')->with('success', 'تم تغير كلمة السر بنجاح');;
      }
      else{
        return redirect('changepassword/index')->with('master_error', '!خطأ:لم يتم تغير كلمة السر')->withInput();
      }
    }
    else{
      return redirect('changepassword/index')->with('master_error', 'كلمة السر القديمة غير صحيحة')->withInput();
    }

}
  }
