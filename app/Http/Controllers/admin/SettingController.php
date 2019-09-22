<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Admin;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    
    public function edit()
    {


        $admin = Admin::where('id',1)->first();

        return view("admin.admins.editadmin")->with('admin',$admin);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $id= 1;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:18',
            'email' => 'required|email|'.update_unique_validate('email',$id,'admins'),
            'phone' => 'required|regex:/(01)[0-9]{8}/|'.update_unique_validate('phone',$id,'admins'),
        ]);
        if ($validator->fails()) {
          return Redirect::back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $admin = Admin::find($id);
        $admin->name =$request->get('name');
        $admin->email =$request->get('email');
        $admin->phone =$request->get('phone');
        $admin->save();
        // return redirect('admin/home/index')->with('success', ' تم التعديل!');
        // return redirect()->back()->with('success', ['your message,here']);   
        return Redirect::back()->with('success', 'تم التعديل  بنجاح');


        // return redirect('admin/home/'.$id.'/edit')->with('success', 'تم التعديل بنجاح');
    }
    


}
