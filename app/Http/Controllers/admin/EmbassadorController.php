<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Embassador;
use App\City;
use DB;

use Illuminate\Http\Request;

class EmbassadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        {   $auth_user=1;
            $show_embassador='';
            $all_embassdors_cities = DB::table('embassadors')
                ->join('cities', 'embassadors.city', '=', 'cities.id')
                ->select('embassadors.birth_date','embassadors.first_name','embassadors.second_name','embassadors.email','embassadors.phone','embassadors.id as embassador_id','cities.name as city_name' )
                ->where('embassadors.agent_id',$auth_user)
                ->orderBy('embassadors.id','desc')->paginate(10);

                return view('admin.embassadors.index')
                ->with('all_embassdors_cities', $all_embassdors_cities)
                ->with('show_embassador',$show_embassador);
        }

      

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cities = City::where('country_id',191)->get();
      return view('admin.embassadors.create')->with('cities', $cities);
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
            'email' => 'required|email|'.unique_validate('email'),
            'phone' => 'required|regex:/(01)[0-9]{8}/|'.unique_validate('phone'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            // 'confirm_password' => 'min:8'
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
  $embassador->phone_key = '+966';//$request->code;
  $embassador->country = 191;//id of suadia
  $embassador->city = $request->city;
  $embassador->birth_date = $request->birth_date;
  $embassador->password = $request->password;
  $embassador->agent_id = 1; //get it from auth
  $embassador->remember_token = $request->_token;
  $save_embassador=$embassador->save();
  $id=$embassador->id;
  $embassador_id=Embassador::where('id',$id)->select('id','generate_id')->first();
  $embassador_id->generate_id=$id;
  $embassador_id->save();
  if($save_embassador){
    return Redirect::back()->with('success', 'تم التسجيل بنجاح');
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
        ->select('embassadors.first_name','embassadors.second_name','embassadors.email','embassadors.phone','embassadors.phone_key','embassadors.birth_date','embassadors.id as embassador_id','cities.name as city_name' )
        ->where('embassadors.id',$id)->first();
    // $show_embassador = Embassadors::find($id);
    return response()->json($show_embassador);
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
        $embassador = Embassador::find($id);
        return view("admin.embassadors.edit")->with('cities', $cities)->with('embassador',$embassador);;
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
            'email' => 'required|email|'.update_unique_validate('email',$id,'embassadors'),
            'phone' => 'required|regex:/(01)[0-9]{8}/|'.update_unique_validate('phone',$id,'embassadors'),
            'city' => 'required|exists:cities,id',
            'birth_date' => 'date|before:-18 years|required',
            ]);
        if ($validator->fails()) {
            return redirect('admin/embassador/'.$id.'/edit')
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
        $save_embassador=$embassador->save();
        if($save_embassador){
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
