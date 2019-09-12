<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Embassador;
use App\City;
use App;
// use App\Country;

class embassadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $cities = City::where('country_id',191)->get();
      return view('front.embassadors.create')->with('cities', $cities);
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
                  'phone' => 'required|regex:/(01)[0-9]{9}/|'.unique_validate('phone'),
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
        $embassador->phone_key = '+966';//$request->code;
        $embassador->country = 191;//id of suadia
        $embassador->city = $request->city;
        $embassador->birth_date = $request->birth_date;
        $embassador->password = $request->password;
        $embassador->agent_id = 1; //get it from auth

        $save_embassador=$embassador->save();
        if($save_embassador){
                return redirect('embassador/create')->with('success', 'تم التسجيل بنجاح');
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
        //
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
        $embassador=Embassador::select('id','first_name','second_name','email','phone','city','birth_date','agent_id')->find($id);
        $agent_id=$embassador->agent_id;
        $auth_user=1; //come from auth_id
        if($agent_id==$auth_user){
          return view('front.embassadors.edit')->with('cities', $cities)->with('embassador', $embassador);
        }
        else{
        dd('غير مسموح لك التعديل عل هذا السفير');
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
      $validator = Validator::make($request->all(), [
                  'first_name' => 'required|max:18',
                  'second_name' => 'required|max:18',
                  'email' => 'required|email|'.update_unique_validate('email',$id,'embassadors'),
                  'phone' => 'required|regex:/(01)[0-9]{9}/|'.update_unique_validate('phone',$id,'embassadors'),
                  'city' => 'required|exists:cities,id',
                  'birth_date' => 'date|before:-18 years|required',
                  ]);
              if ($validator->fails()) {
                  return redirect('embassador/'.$id.'/edit')
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
                      return redirect('embassador/'.$id.'/edit')->with('success', 'تم التعديل بنجاح');
                  }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getcities($id)
    {
      // $code_country=Country::where("id",$id)->select('code_country')->first();
      $cities=City::where("countryID",$id)->get();
      // return response()->json(['cities'=>$cities,'code_country'=>$code_country]);
      return response()->json($cities);

    }
}
