<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Agent;
use App\City;
use DB;
use App\Services\VerifyUserService;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //  $agents = Agent::orderBy('created_at', 'desc')->paginate(3);
        // return view('admin.agents.index')->with('agents',$agents);
            $searchByName = trim(request('search'));
            $searchByPhone = trim(request('search_byphone'));
            $searchByEmail =trim(request('search_byemail'));
            $show_agent='';
            $agents = DB::table('agents')
                ->join('cities', 'agents.city', '=', 'cities.id')
                ->select('agents.name','agents.birth_date','agents.email','agents.phone','agents.id as agent_id',
                'cities.name as city_name' )
                ->orderBy('agents.id','desc');
                    if(request()->has('search') && request()->get('search')!= '' ){
                        $agents->where(function ($q) use ($searchByName) {
                       $q->where('agents.name','like',"%".$searchByName."%");});
                    }
                if(request()->has('search_byphone') && request()->get('search_byphone')!= '' ){
                    $agents->where(function ($q) use ($searchByPhone) {

                    $q->where('agents.phone','like',"%".$searchByPhone."%");});
                 }

                 if(request()->has('search_byemail') && request()->get('search_byemail')!= '' ){
                    $agents->where(function ($q) use ($searchByEmail) {

                    $q->where('agents.email','like',"%".$searchByEmail."%");});
                 }
                $agents = $agents->paginate(10);
                return view('admin.agents.index')->with('agents', $agents)->with('searchByName',$searchByName)->with('searchByPhone',$searchByPhone)->with('searchByEmail',$searchByEmail)->with('show_agent',$show_agent);

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
                  'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.unique_validate('phone'),
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
        $agent->password = bcrypt($request->password);
        $agent->admin_id = adminUser()->id;
        $save_agent=$agent->save();
        if($save_agent){

            VerifyUserService::verify($agent);

            return redirect('admin/agent')->with('success', ' تم التسجيل بنجاح!');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $all_agents_cities = DB::table('agents')
        ->join('cities', 'agents.city', '=', 'cities.id')
        ->select('agents.name','agents.email','agents.phone','agents.id as agent_id','cities.name as city_name' )
        ->orderBy('name','desc')->paginate(3)->get();
         return view('admin.agents.index')->with('all_agents_cities', $all_agents_cities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cities = City::where('country_id',191)->get();

        $agent = Agent::find($id);

        return view("admin.agents.edit")->with('cities', $cities)->with('agent',$agent);;



        // $edit_agent='';
        // $all_agents_cities = DB::table('agents')
        //     ->join('cities', 'agents.city', '=', 'cities.id')
        //     ->select('agents.name','agents.password','agents.birth_date','agents.email','agents.phone','agents.id as agent_id','cities.name as city_name' )
        //     ->orderBy('agents.id','desc')->first();
        //     return view('admin.agents.edit')->with('all_agents_cities', $all_agents_cities)->with('edit_agent',$edit_agent);


        //;
        // $agent = Agent::find($id);
        // return view('admin.agents.edit', compact('agent'));
        // return view('admin.agents.edit')->with('cities', $cities)->with('agent', $agent);

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:18',
            // 'email' => 'required|email|'.unique_validate('email'),
            'email' => 'required|email|'.update_unique_validate('email',$id,'agents'),

            'phone' => 'required|regex:/(01)[0-9]{8}/|'.update_unique_validate('phone',$id,'agents'),
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
        $agent = Agent::find($id);
        $current_email = $agent->email;

        $agent->name =$request->get('name');
        $agent->email =$request->get('email');
        $agent->phone =$request->get('phone');
        $agent->city =$request->get('city');
        $agent->birth_date =$request->get('birth_date');

        $agent->save();


        if($current_email != $agent->email){
            VerifyUserService::verify($agent);
        }

        return redirect('admin/agent')->with('success', ' تم التعديل!');



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
