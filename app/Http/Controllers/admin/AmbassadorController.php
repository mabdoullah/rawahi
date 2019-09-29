<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Ambassador;
use App\City;
use App\Agent;
use DB;

use Illuminate\Http\Request;

use App\Services\VerifyUserService;

class AmbassadorController extends Controller
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

        // $ambassadors = DB::table('ambassadors')
        //     ->join('cities', 'ambassadors.city', '=', 'cities.id')
        //     ->join('agents', 'ambassadors.agent_id', '=', 'agents.id')
        //     ->select(
        //         'agents.name as agent_name',
        //         'ambassadors.birth_date',
        //         'ambassadors.first_name',
        //         'ambassadors.second_name',
        //         'ambassadors.email',
        //         'ambassadors.phone',
        //         'ambassadors.id as ambassador_id',
        //         'cities.name as city_name',
        //         'ambassadors.agent_id as agent_id'
        //     );
        // if ($agent_id) 
        // {

        //     $ambassadors = $ambassadors->where('ambassadors.agent_id', $agent_id);
        // }
        //  $ambassadors = $ambassadors->orderBy('ambassadors.id', 'desc')->paginate(10);
        // return view('admin.ambassadors.index', compact('agent_id', 'ambassadors', 'agents'));




        
        $searchByName = trim(request('search'));
        $searchByEmail = trim(request('search_byemail'));
        $searchByPhone = trim(request('search_byphone'));
        $searchByAgent = request('search_agent');
// dd($searchByAgent);
        $agents = Agent::all(); 
        $agent_id = $request->agent;


        $show_ambassador='';
        $ambassadors = DB::table('ambassadors')
        ->join('cities', 'ambassadors.city', '=', 'cities.id')
        ->join('agents', 'ambassadors.agent_id', '=', 'agents.id')
        ->select('agents.name as agent_name', 'ambassadors.birth_date', 'ambassadors.first_name',
         'ambassadors.second_name', 'ambassadors.email', 'ambassadors.phone', 
         'ambassadors.id as ambassador_id',
          'cities.name as city_name', 'ambassadors.agent_id as agent_id')->orderBy('ambassador_id','desc');



          if(request()->has('search') && request()->get('search')!= '' ){
            $ambassadors->where(function ($q) use ($searchByName) {
            $q->where('ambassadors.first_name','like',"%".$searchByName."%")
              ->orWhere('ambassadors.second_name','like',"%".$searchByName."%");});
         }

         if(request()->has('search_byphone') && request()->get('search_byphone')!= '' ){
            $ambassadors->where(function ($q) use ($searchByPhone) {
            $q->where('ambassadors.phone','like',"%".$searchByPhone."%");});
         }

         if(request()->has('search_byemail') && request()->get('search_byemail')!= '' ){
            $ambassadors->where(function ($q) use ($searchByEmail) {
            $q->where('ambassadors.email','like',"%".$searchByEmail."%");});
         }

         if(request()->has('search_agent') && request()->get('search_agent') != '' ){
            $ambassadors->where(function ($q) use ($searchByAgent) {
            $q->where('agents.id',$searchByAgent);});
         }
        //  dd($ambassadors->get());

            // if($agent_id){

            //     $ambassadors = $ambassadors->where('ambassadors.agent_id', $agent_id);
            // }              
    

            $ambassadors = $ambassadors->paginate(10);
// dd($ambassadors);

            return view('admin.ambassadors.index')->with('searchByAgent', $searchByAgent)->with('agents', $agents)->with('show_ambassador',$show_ambassador)->with('ambassadors',$ambassadors)->with('searchByName',$searchByName)->with('searchByEmail',$searchByEmail)->with('searchByPhone',$searchByPhone)->with('agent_id',$agent_id);





        // }


        //->with('ambassadors', $ambassadors)
        //->with('agents', $agents);
        // ->with('show_ambassador', $show_ambassador);
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
        return view('admin.ambassadors.create')->with('cities', $cities)->with('agents', $agents);
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
            return redirect('admin/ambassador/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $ambassador = new Ambassador;
        $ambassador->first_name = $request->first_name;
        $ambassador->second_name = $request->second_name;
        $ambassador->email = $request->email;
        $ambassador->phone = $request->phone;
        $ambassador->phone_key = '+966'; //$request->code;
        $ambassador->country = 191; //id of suadia
        $ambassador->city = $request->city;
        $ambassador->birth_date = $request->birth_date;
        $ambassador->password = bcrypt($request->password);
        $ambassador->agent_id = $request->agent_id;
        // $ambassador->remember_token = $request->_token;
        $save_ambassador = $ambassador->save();
        // dd($ambassador);
        $ambassador_id = Ambassador::where('id', $ambassador->id)->select('id', 'generate_id')->first();
        $ambassador_id->generate_id = $ambassador_id->id;
        $ambassador_id->save();
        if ($save_ambassador) {

            VerifyUserService::verify($ambassador);

            return redirect('admin/ambassador')->with('success', 'تم التسجيل بنجاح');
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

        $show_ambassador = DB::table('ambassadors')
            ->join('cities', 'ambassadors.city', '=', 'cities.id')
            ->select('ambassadors.first_name', 'ambassadors.second_name', 'ambassadors.email', 'ambassadors.phone', 'ambassadors.phone_key', 'ambassadors.birth_date', 'ambassadors.id as ambassador_id', 'cities.name as city_name')
            ->where('ambassadors.id', $id)->first();
        // $show_ambassador = Ambassadors::find($id);
        return response()->json($show_ambassador);
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
        $ambassador = Ambassador::find($id);
        // return view("admin.ambassadors.edit")->with('cities', $cities)->with('ambassador', $ambassador)->with('agents',$agents);
        return view('admin.ambassadors.edit', compact('agent_id', 'ambassador', 'agents', 'cities'));
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
            'email' => 'required|email|' . update_unique_validate('email', $id, 'ambassadors'),
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . update_unique_validate('phone', $id, 'ambassadors'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            'agent_id' => 'required|exists:agents,id'

        ]);
        if ($validator->fails()) {
            return redirect('admin/ambassador/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $ambassador = Ambassador::find($id);
        $current_email = $ambassador->email;

        $ambassador->first_name = $request->first_name;
        $ambassador->second_name = $request->second_name;
        $ambassador->email = $request->email;
        $ambassador->phone = $request->phone;
        $ambassador->city = $request->city;
        $ambassador->birth_date = $request->birth_date;
        $ambassador->agent_id = $request->agent_id;

        $save_ambassador = $ambassador->save();
        if ($save_ambassador) {

            if($current_email != $ambassador->email){
                VerifyUserService::verify($ambassador);
            }

            return redirect('admin/ambassador')->with('success', 'تم التعديل بنجاح');
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
        $ambassador = Ambassador::find($id);
        $ambassador->delete();


        return redirect('admin/ambassador')->with('success', ' تم الحذف!');

        return redirect('admin.ambassadors.index')->with('success', 'Contact deleted!');
    }
}
