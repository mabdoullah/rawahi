<?php

namespace App\Http\Controllers\front;

use App;
use App\City;
use App\Embassador;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use App\Country;
use Illuminate\Support\Facades\Validator;

class embassadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show_embassador = '';
        $all_embassdors_cities = DB::table('embassadors')
            ->join('cities', 'embassadors.city', '=', 'cities.id')
            ->select('embassadors.first_name', 'embassadors.email', 'embassadors.phone', 'embassadors.id as embassador_id', 'cities.name as city_name')
            ->where('embassadors.agent_id', agentUser()->id)
            ->orderBy('embassadors.id', 'desc')->paginate(10);
        return view('front.embassadors.index')->with('all_embassdors_cities', $all_embassdors_cities)->with('show_embassador', $show_embassador);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // dd('8i87989');
        $cities = City::where('country_id', 191)->get();
        return view('front.embassadors.edit_add')->with('cities', $cities);
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
            // 'confirm_password' => 'min:8'
        ]);
        if ($validator->fails()) {
            return redirect('embassador/create')
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
        $embassador->agent_id = agentUser()->id; //get it from auth
        $save_embassador=$embassador->save();
        // get generate_id from function
        $generate_id=generate_embassador_number($embassador->id);
        Embassador::where('id', $embassador->id)->update(['generate_id' =>$generate_id]);
        if($save_embassador){
          // dd($embassador->getGuard());
          // dd($save_embassador);
          // VerifyUserService::createUser($embassador,'embassador');

            return redirect('embassador')->with('success', 'تم تسجيل سفير بنجاح');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_embassador = DB::table('embassadors')
            ->join('cities', 'embassadors.city', '=', 'cities.id')
            ->select('embassadors.agent_id', 'embassadors.first_name', 'embassadors.second_name', 'embassadors.email', 'embassadors.phone', 'embassadors.phone_key', 'embassadors.birth_date', 'embassadors.id as embassador_id', 'cities.name as city_name')
            ->where('embassadors.id', $id)->first();
        if (!$show_embassador) {
            return redirect('embassador');

        } else {

            if ($show_embassador->agent_id == agentUser()->id) {
                return response()->json($show_embassador);
            } else {
                return redirect('embassador')->with('master_error', 'غير مسموح بعرض هذا السفير');
            }
        }
        // $show_embassador = Embassadors::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::where('country_id',191)->get();
        $embassador=Embassador::where('id',$id)->select('id','first_name','second_name','email','phone','city','birth_date','agent_id')->first();
        if(!$embassador)
        {
          return redirect('embassador');
        }
      else{

            if((agentUser())&&(($embassador->agent_id == agentUser()->id)))
              {
                return view('front.embassadors.edit_add')->with('cities', $cities)->with('embassador', $embassador);
              }
            if((embassadorUser())&&($embassador->id == embassadorUser()->id))
              {
                return view('front.embassadors.edit_add')->with('cities', $cities)->with('embassador', $embassador);
              }
               return redirect('embassador')->with('master_error', 'غير مسموح لك تعديل هذا السفير');

          }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $embassador = Embassador::find($id);
      if(!$embassador)
      {
        return redirect('embassador');
      }

      $validator = Validator::make($request->all(), [
                  'first_name' => 'required|max:18',
                  'second_name' => 'required|max:18',
                  'email' => 'required|email|'.update_unique_validate('email',$id,'embassadors'),
                  'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.update_unique_validate('phone',$id,'embassadors'),
                  'city' => 'required|exists:cities,id',
                  'birth_date' => 'date|before:-18 years|required',
                  ]);
              if ($validator->fails()) {
                  return redirect('embassador/'.$id.'/edit')
                              ->withErrors($validator)
                              ->withInput()
                              ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
              }
      $embassador->first_name = $request->first_name;
      $embassador->second_name = $request->second_name;
      $embassador->email = $request->email;
      $embassador->phone = $request->phone;
      $embassador->city = $request->city;
      $embassador->birth_date = $request->birth_date;
      $save_embassador=$embassador->save();
      if($save_embassador){
        if(agentUser()){
            return redirect('embassador')->with('success', 'تم التعديل بنجاح');
        }
        if(embassadorUser()){
            return redirect('embassador/'.$id.'/edit')->with('success', 'تم التعديل بنجاح');
        }
     }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $id=$request->delete_id;
      $embassador=Embassador::where('id',$id)->select('id','agent_id')->first();
      if(!$embassador)
      {  return redirect('embassador');}
      else
      { $agent_id=$embassador->agent_id;
        if($agent_id==agentUser()->id){
          $delete_embassador=DB::table('embassadors')->where('id', $id)->delete();
          return redirect('embassador')->with('success', 'تم الحذف بنجاح');
        }
        else{
          return redirect('embassador')->with('master_error', 'غير مسموح بحذف هذا السفير');
        }


        }
    }
}
