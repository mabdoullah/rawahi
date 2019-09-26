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
    public function index(Request $request)
    {
      $searchByName=$request->search_name;
      $searchByEmail=$request->search_email;
      $searchByCity=$request->search_city;
      $show_embassador = '';
      $cities = City::where('country_id', 191)->get();
      $embassdors = Embassador::with(
              ['citydata' => function ($query) use ($searchByCity){
              $query->select('id', 'name')->where('id','like',"%".$searchByCity."%");
              }])->select('generate_id','first_name', 'email', 'phone', 'id','city')
                 ->where('agent_id', agentUser()->id)
                 ->where(function ($q1) use ($searchByName) {
                 $q1->where('first_name','like',"%".$searchByName."%")
                    ->orWhere('second_name','like',"%".$searchByName."%");})
                ->where(function ($q2) use ($searchByEmail) {
                $q2->where('email','like',"%".$searchByEmail."%");});
     // if(request()->has('search_name') && request()->get('search_name')!= '' ){
     //    $embassdors->where(function ($q) use ($searchByName) {
     //    $q->where('first_name','like',"%".$searchByName."%")
     //      ->orWhere('second_name','like',"%".$searchByName."%");});
     // }
     //
     // if(request()->has('search_email') && request()->get('search_email')!= '' ){
     //   $embassdors->where(function ($q) use ($searchByEmail) {
     //   $q->where('email','like',"%".$searchByEmail."%");});
     // }

     $embassdors = $embassdors->orderBy('embassadors.id', 'desc')->paginate(10);
    return view('front.embassadors.index')->with('cities', $cities)->with('embassdors', $embassdors)->with('show_embassador', $show_embassador);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      $show_embassador = Embassador::with(['citydata' => function ($query){$query->select('id', 'name');}])
                      ->select('agent_id','generate_id','first_name','second_name', 'email', 'phone', 'id','city','birth_date')
                      ->where('id', $id)->first();

      if(!$show_embassador) {
        return redirect('embassador');
      }else{
          if ($show_embassador->agent_id == agentUser()->id) {
              return response()->json($show_embassador);
          } else {
              return redirect('embassador')->with('master_error', 'غير مسموح بعرض هذا السفير');
          }
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $embassador = Embassador::find($id);
        if(empty($embassador)) return redirect('embassador');

        if(embassadorUser() && embassadorUser()->id != $embassador->id) return redirect('/');
        
        if(agentUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(agentUser()->id != $embassador->agent_id) return redirect('/');
        }
         
        $cities = City::where('country_id',191)->get();
        
        return view('front.embassadors.edit_add',compact('cities','embassador'));
        

        // return redirect('embassador')->with('master_error', 'غير مسموح لك تعديل هذا السفير');

        
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
        if(empty($embassador)) return redirect('embassador');

        if(embassadorUser() && embassadorUser()->id != $embassador->id) return redirect('/');
        
        if(agentUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(agentUser()->id != $embassador->agent_id) return redirect('/');
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
