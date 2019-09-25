<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Hash;
use App\Admin;


class ChangePasswordController extends Controller
{
  public function change()
  {
    return view('admin.changePassword.changepassword_form');
  }
  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'old_password' => 'min:8|required',
        'new_password' => 'min:8|required_with:confirm_password|same:confirm_password',
    ]);
    if ($validator->fails()) {
        return redirect('admin/settings/password')
            ->withErrors($validator)
            ->withInput()
            ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
    }
    // dd(adminUser());
    // dd(currentUser());
    // check if  old password matches the hash in the database
    if (Hash::check($request->old_password ,adminUser()->password)) {
      $table_name=adminUser()->getTable();
      $ckeck_password=Admin::whereId(adminUser()->id)->update(['password' => bcrypt($request->new_password)]);
      if($ckeck_password){
        return redirect('admin/settings/password')->with('success', 'تم تغير كلمة السر بنجاح');;
      }
      else{
        return redirect('admin/settings/password')->with('master_error', '!خطأ:لم يتم تغير كلمة السر')->withInput();
      }
    }
    else{
      return redirect('admin/settings/password')->with('master_error', 'كلمة السر القديمة غير صحيحة')->withInput();
    }
}
  }
