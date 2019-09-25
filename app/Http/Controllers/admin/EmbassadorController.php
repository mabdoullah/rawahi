<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Embassador;
use App\City;
use App\Agent;
use DB;

use Illuminate\Http\Request;

class EmbassadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // $agents = Agent::all();
        // // dd($request);
        // $agent_id = $request->agent;

        // $embassadors = DB::table('embassadors')
        //     ->join('cities', 'embassadors.city', '=', 'cities.id')
        //     ->join('agents', 'embassadors.agent_id', '=', 'agents.id')
        //     ->select(
        //         'agents.name as agent_name',
        //         'embassadors.birth_date',
        //         'embassadors.first_name',
        //         'embassadors.second_name',
        //         'embassadors.email',
        //         'embassadors.phone',
        //         'embassadors.id as embassador_id',
        //         'cities.name as city_name',
        //         'embassadors.agent_id as agent_id'
        //     );
        // if ($agent_id) 
        // {

        //     $embassadors = $embassadors->where('embassadors.agent_id', $agent_id);
        // }
        //  $embassadors = $embassadors->orderBy('embassadors.id', 'desc')->paginate(10);
        // return view('admin.embassadors.index', compact('agent_id', 'embassadors', 'agents'));




        
        $searchByName = trim(request('search'));
        $searchByEmail = trim(request('search_byemail'));
        $searchByPhone = trim(request('search_byphone'));
        $searchByAgent = request('search_agent');
// dd($searchByAgent);
        $agents = Agent::all(); 
        $agent_id = $request->agent;


        $show_embassador='';
        $embassadors = DB::table('embassadors')
        ->join('cities', 'embassadors.city', '=', 'cities.id')
        ->join('agents', 'embassadors.agent_id', '=', 'agents.id')
        ->select('agents.name as agent_name', 'embassadors.birth_date', 'embassadors.first_name',
         'embassadors.second_name', 'embassadors.email', 'embassadors.phone', 
         'embassadors.id as embassador_id',
          'cities.name as city_name', 'embassadors.agent_id as agent_id')->orderBy('embassador_id','desc');



          if(request()->has('search') && request()->get('search')!= '' ){
            $embassadors->where(function ($q) use ($searchByName) {
            $q->where('embassadors.first_name','like',"%".$searchByName."%")
              ->orWhere('embassadors.second_name','like',"%".$searchByName."%");});
         }

         if(request()->has('search_byphone') && request()->get('search_byphone')!= '' ){
            $embassadors->where(function ($q) use ($searchByPhone) {
            $q->where('embassadors.phone','like',"%".$searchByPhone."%");});
         }

         if(request()->has('search_byemail') && request()->get('search_byemail')!= '' ){
            $embassadors->where(function ($q) use ($searchByEmail) {
            $q->where('embassadors.email','like',"%".$searchByEmail."%");});
         }

         if(request()->has('search_agent') && request()->get('search_agent') != '' ){
            $embassadors->where(function ($q) use ($searchByAgent) {
            $q->where('agents.id',$searchByAgent);});
         }
        //  dd($embassadors->get());

            // if($agent_id){

            //     $embassadors = $embassadors->where('embassadors.agent_id', $agent_id);
            // }              
    

            $embassadors = $embassadors->paginate(10);
// dd($embassadors);

            return view('admin.embassadors.index')->with('agents', $agents)->with('show_embassador',$show_embassador)->with('embassadors',$embassadors)->with('agent_id',$agent_id);





        // }


        //->with('embassadors', $embassadors)
        //->with('agents', $agents);
        // ->with('show_embassador', $show_embassador);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $cities = City::where('country_id', 191)->get();
        return view('admin.embassadors.create')->with('cities', $cities)->with('agents', $agents);
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
            'first_name' => 'required|max:18',
            'second_name' => 'required|max:18',
            'email' => 'required|email|' . unique_validate('email'),
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . unique_validate('phone'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'agent_id' => 'required|exists:agents,id'
        ]);
        if ($validator->fails()) {
            return redirect('admin/embassador/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $embassador = new Embassador;
        $embassador->first_name = $request->first_name;
        $embassador->second_name = $request->second_name;
        $embassador->email = $request->email;
        $embassador->phone = $request->phone;
        $embassador->phone_key = '+966'; //$request->code;
        $embassador->country = 191; //id of suadia
        $embassador->city = $request->city;
        $embassador->birth_date = $request->birth_date;
        $embassador->password = bcrypt($request->password);
        $embassador->agent_id = $request->agent_id;
        // $embassador->remember_token = $request->_token;
        $save_embassador = $embassador->save();
        // dd($embassador);
        $embassador_id = Embassador::where('id', $embassador->id)->select('id', 'generate_id')->first();
        $embassador_id->generate_id = $embassador_id->id;
        $embassador_id->save();
        if ($save_embassador) {
            return redirect('admin/embassador')->with('success', 'تم التسجيل بنجاح');
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

        $show_embassador = DB::table('embassadors')
            ->join('cities', 'embassadors.city', '=', 'cities.id')
            ->select('embassadors.first_name', 'embassadors.second_name', 'embassadors.email', 'embassadors.phone', 'embassadors.phone_key', 'embassadors.birth_date', 'embassadors.id as embassador_id', 'cities.name as city_name')
            ->where('embassadors.id', $id)->first();
        // $show_embassador = Embassadors::find($id);
        return response()->json($show_embassador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)

    {
        $agent_id = $request->agent;

        $agents = Agent::all();
        $cities = City::where('country_id', 191)->get();
        $embassador = Embassador::find($id);
        // return view("admin.embassadors.edit")->with('cities', $cities)->with('embassador', $embassador)->with('agents',$agents);
        return view('admin.embassadors.edit', compact('agent_id', 'embassador', 'agents', 'cities'));
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
            'first_name' => 'required|max:18',
            'second_name' => 'required|max:18',
            'email' => 'required|email|' . update_unique_validate('email', $id, 'embassadors'),
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . update_unique_validate('phone', $id, 'embassadors'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            'agent_id' => 'required|exists:agents,id'

        ]);
        if ($validator->fails()) {
            return redirect('admin/embassador/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $embassador = Embassador::find($id);
        $embassador->first_name = $request->first_name;
        $embassador->second_name = $request->second_name;
        $embassador->email = $request->email;
        $embassador->phone = $request->phone;
        $embassador->city = $request->city;
        $embassador->birth_date = $request->birth_date;
        $embassador->agent_id = $request->agent_id;

        $save_embassador = $embassador->save();
        if ($save_embassador) {
            return redirect('admin/embassador')->with('success', 'تم التعديل بنجاح');
        }
    }



    public function search(Request $request)
    {
        // $type = $request->type;
        // $data = $request->data;
        // // dd($request);
        // if($type != null){
        //     if($data !=null){
        //         if($type =='email'){
        //             $agents  =  Agent::where('email',$data)->get();
        //             if(count($agents)>0){
        //               return response()->json(['agents'=>$agents,'message'=>'حصلت على البانات بنجاح']);
        //             }else{
        //               return response()->json(['agents'=>[],'message'=>'لا توجد بيانات لهذا  التعريفي']);
        //             }

        //         }elseif($type=='Number'){
        //             $agents  =  Agent::where('phone',$data)->get();
        //             if(count($agents)>0){
        //               return response()->json(['agents'=>$agents,'message'=>'you get data successfully']);
        //             }else{
        //               return response()->json(['agents'=>[],'message'=>'لا يوجد بيانات لهذا الرقم']);
        //             }

        //         }elseif($type=='Name'){
        //           $agents  =  Agent::where('name',$data)->get();
        //           if(count($agents)>0){
        //             return response()->json(['agents'=>$agents,'message'=>'حصلت على البيانات بنجاح']);
        //           }else{
        //             return response()->json(['agents'=>[],'message'=>'لا توجد بيانات لهذا الاسم']);
        //           }

        //         }else{
        //           return response()->json(['agents'=>[],'message'=>' Please Enter  valid  Data ']);
        //         }
        //     }
        //     return response()->json(['agents'=>[],'message'=>' Please Enter Data of Type Seach ']);
        // }

        // return response()->json(['agents'=>[],'message'=>' Please chosse Type ']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $Agent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $embassador = Embassador::find($id);
        $embassador->delete();


        return redirect('admin/embassador')->with('success', ' تم الحذف!');

        return redirect('admin.embassadors.index')->with('success', 'Contact deleted!');
    }
}
