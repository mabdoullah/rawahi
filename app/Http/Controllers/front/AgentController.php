<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Agent;
use App\City;
use DB;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $agent = Agent::find($id);
        if(empty($agent)) return redirect('/');

        if(agentUser() && agentUser()->id != $id) return redirect('/');

        $cities = City::where('country_id',191)->get();
        
        return view('front.agents.edit',compact('cities','agent'));
        //  return redirect('agent/'.$id.'/edit')->with('master_error', 'غير مسموح بتعديل هذا الوكيل');
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);
        if(empty($agent)) return redirect('/');

        if(agentUser() && agentUser()->id != $id) return redirect('/');
        

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:18',
            'email' => 'required|email|'.update_unique_validate('email',$id,'agents'),

            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.update_unique_validate('phone',$id,'agents'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            // 'confirm_password' => 'min:8'
        ]);
        if ($validator->fails()) {
          return Redirect::back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        
        $agent->name =$request->get('name');
        $agent->email =$request->get('email');
        $agent->phone =$request->get('phone');
        $agent->city =$request->get('city');
        $agent->birth_date =$request->get('birth_date');
        $save_agent=$agent->save();
        if($save_agent){
              return redirect('agent/'.$id.'/edit')->with('success', 'تم التعديل بنجاح');
        }
    }



    public function search(Request $request)
    {
        $type = $request->type;
        $data = $request->data;
        // dd($request);
        if($type != null){
            if($data !=null){
                if($type =='email'){
                    $agents  =  Agent::where('email',$data)->get();
                    if(count($agents)>0){
                      return response()->json(['agents'=>$agents,'message'=>'حصلت على البانات بنجاح']);
                    }else{
                      return response()->json(['agents'=>[],'message'=>'لا توجد بيانات لهذا  التعريفي']);
                    }

                }elseif($type=='Number'){
                    $agents  =  Agent::where('phone',$data)->get();
                    if(count($agents)>0){
                      return response()->json(['agents'=>$agents,'message'=>'you get data successfully']);
                    }else{
                      return response()->json(['agents'=>[],'message'=>'لا يوجد بيانات لهذا الرقم']);
                    }

                }elseif($type=='Name'){
                  $agents  =  Agent::where('name',$data)->get();
                  if(count($agents)>0){
                    return response()->json(['agents'=>$agents,'message'=>'حصلت على البيانات بنجاح']);
                  }else{
                    return response()->json(['agents'=>[],'message'=>'لا توجد بيانات لهذا الاسم']);
                  }

                }else{
                  return response()->json(['agents'=>[],'message'=>' Please Enter  valid  Data ']);
                }
            }
            return response()->json(['agents'=>[],'message'=>' Please Enter Data of Type Seach ']);
        }

        return response()->json(['agents'=>[],'message'=>' Please chosse Type ']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        $agent->delete();


        return redirect('admin/agent')->with('success', ' تم الحذف!');

        // return redirect('admin.agents.index')->with('success', 'Contact deleted!');
    }



}
