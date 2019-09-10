<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Embassador;
use App\City;
use App;
// use App\Country;

class EmbssadorController extends Controller
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
      return view('front.embassadors.registration-form')->with('cities', $cities);
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
                  'email' => 'required|email|unique:embassadors,email',
                  'phone' => 'required|regex:/(01)[0-9]{9}/|unique:embassadors,phone',
                  'city' => 'required|exists:cities,id',
                  'birth_date' => 'date|before:-18 years|required',
                  'password' => 'min:8|required_with:confirm_password|same:confirm_password',
                  // 'confirm_password' => 'min:8'
              ]);
              if ($validator->fails()) {
                  return redirect('embssador/create')
                              ->withErrors($validator)
                              ->withInput()
                              ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
              }
        $embssador = new Embassador;
        $embssador->first_name = $request->first_name;
        $embssador->second_name = $request->second_name;
        $embssador->email = $request->email;
        $embssador->phone = $request->phone;
        $embssador->phone_key = '+966';//$request->code;
        $embssador->country = 191;//id of suadia
        $embssador->city = $request->city;
        $embssador->birth_date = $request->birth_date;
        $embssador->password = $request->password;
        $embssador->agent_id = 1; //get it from auth

        $save_embssador=$embssador->save();
        if($save_embssador){
                return redirect('embssador/create')->with('success', 'تم التسجيل بنجاح');
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
        //
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
        //
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
