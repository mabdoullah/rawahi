<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Agent;
use App\City;

use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cities = City::where('country_id',191)->get();
      return view('admin.agents.create')->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
                  'name' => 'required|max:18',
                  'email' => 'required|email|'.unique_validate('email'),
                  'phone' => 'required|regex:/^[0-9]{10}$/|'.unique_validate('phone'),
                  'city' => 'required|exists:cities,id',
                  'birth_date' => 'date|before:-18 years|required',
                  'password' => 'min:8|required_with:confirm_password|same:confirm_password',
                  // 'confirm_password' => 'min:8'
              ]);
              if ($validator->fails()) {
                return Redirect::back()
                              ->withErrors($validator)
                              ->withInput()
                              ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
              }
        $agent = new Agent;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->phone_key = '+966';//$request->code;
        $agent->country = 191;//id of suadia
        $agent->city = $request->city;
        $agent->birth_date = $request->birth_date;
        $agent->password = $request->password;
        $agent->admin_id = 1; //get it from auth

        $save_agent=$agent->save();
        if($save_agent){
              return Redirect::back()->with('success', 'تم التسجيل بنجاح');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $Agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $Agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $Agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $Agent)
    {
        //
    }
}
