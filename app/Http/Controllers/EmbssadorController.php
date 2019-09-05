<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Embassador;
use App\City;
use App\Country;

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
      $cities=City::where('countryID',1)->get();
      $countries=Country::where('id',1)->first();
      return view('layout_desgin.registration-form')->with('countries', $countries)->with('cities', $cities);

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
                  'secound_name' => 'required|max:18',
                  'email' => 'required|email|unique:embassadors,email',
                  'phone_number' => 'required|numeric|min:11|unique:embassadors,phonenumber',
                  // 'code' => 'required',
                  'country' => 'required',
                  'city' => 'required|exists:cities,id',
                  'birth_date' => 'date|before:-18 years|required',
                  'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                  'confirm_password' => 'min:6'
              ]);

              if ($validator->fails()) {
                  return redirect('embssador/register')
                              ->withErrors($validator)
                              ->withInput()
                              ->with('master_error', 'please fix error in below!');
              }

        $embssador = new Embassador;
        $embssador->firstname = $request->first_name;
        $embssador->secoundname = $request->secound_name;
        $embssador->email = $request->email;
        $embssador->phonenumber = $request->phone_number;
        // $embssador->code_country = $request->code;
        $embssador->country = $request->country;
        $embssador->city = $request->city;
        $embssador->dateofbirth = $request->birth_date;
        $embssador->password = $request->password;
        $embssador->confirmpassword = $request->confirm_password;
        $save_embssador=$embssador->save();
if($save_embssador){
return redirect('embssador/register')->with('success', 'registeration successfull');
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
