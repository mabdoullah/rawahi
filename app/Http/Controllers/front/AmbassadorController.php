<?php

namespace App\Http\Controllers\front;

use App;
use App\City;
use App\Ambassador;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use App\Country;
use Illuminate\Support\Facades\Validator;

class AmbassadorController extends Controller
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
      $show_ambassador = '';
      $cities = City::where('country_id', 191)->get();

      $ambassdors = Ambassador::with('citydata')->select('generate_id','first_name', 'email', 'phone', 'id','city')
                              ->where('agent_id', agentUser()->id)
                              ->where(function ($q1) use ($searchByName) {
                                 $q1->where('first_name','like',"%".$searchByName."%")
                                  ->orWhere('second_name','like',"%".$searchByName."%");})
                            ->where(function ($q2) use ($searchByEmail) {
                                $q2->where('email','like',"%".$searchByEmail."%");});

        if(isset($searchByCity)){
          $ambassdors->with(['citydata' => function ($query) use ($searchByCity){
                     $query->select('id', 'name')->where('id',$searchByCity);}]);
        }
     $ambassdors = $ambassdors->orderBy('embassadors.id', 'desc')->paginate(10);
    return view('front.ambassadors.index')
    ->with('searchByName', $searchByName)
    ->with('searchByEmail', $searchByEmail)
    ->with('searchByCity', $searchByCity)
    ->with('cities', $cities)
    ->with('ambassdors', $ambassdors)
    ->with('show_ambassador', $show_ambassador);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::where('country_id', 191)->get();
        return view('front.ambassadors.edit_add')->with('cities', $cities);
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
            return redirect('ambassador/create')
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
        $ambassador->agent_id = agentUser()->id; //get it from auth
        $save_ambassador=$ambassador->save();
        // get generate_id from function
        $generate_id=generate_ambassador_number($ambassador->id);
        Ambassador::where('id', $ambassador->id)->update(['generate_id' =>$generate_id]);
        if($save_ambassador){
          // dd($ambassador->getGuard());
          // dd($save_ambassador);
          // VerifyUserService::createUser($ambassador,'ambassador');

            return redirect('ambassadors')->with('success', 'تم تسجيل سفير بنجاح');
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
      $show_ambassador = Ambassador::with(['citydata' => function ($query){$query->select('id', 'name');}])
                      ->select('agent_id','generate_id','first_name','second_name', 'email', 'phone', 'id','city','birth_date')
                      ->where('id', $id)->first();

      if(!$show_ambassador) {
        return redirect('ambassadors');
      }else{
          if ($show_ambassador->agent_id == agentUser()->id) {
              return response()->json($show_ambassador);
          } else {
              return redirect('ambassadors')->with('master_error', 'غير مسموح بعرض هذا السفير');
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

        $ambassador = Ambassador::find($id);
        if(empty($ambassador)) return redirect('ambassador');

        if(ambassadorUser() && ambassadorUser()->id != $ambassador->id) return redirect('/');

        if(agentUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(agentUser()->id != $ambassador->agent_id) return redirect('/');
        }

        $cities = City::where('country_id',191)->get();

        return view('front.ambassadors.edit_add',compact('cities','ambassador'));


        // return redirect('ambassador')->with('master_error', 'غير مسموح لك تعديل هذا السفير');


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
        $ambassador = Ambassador::find($id);
        if(empty($ambassador)) return redirect('ambassador');

        if(ambassadorUser() && ambassadorUser()->id != $ambassador->id) return redirect('/');

        if(agentUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(agentUser()->id != $ambassador->agent_id) return redirect('/');
        }



      $validator = Validator::make($request->all(), [
                  'first_name' => 'required|max:18',
                  'second_name' => 'required|max:18',
                  'email' => 'required|email|'.update_unique_validate('email',$id,'ambassadors'),
                  'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.update_unique_validate('phone',$id,'ambassadors'),
                  'city' => 'required|exists:cities,id',
                  // 'birth_date' => 'date|before:-18 years|required',
                  ]);
              if ($validator->fails()) {
                  return redirect('ambassadors/'.$id.'/edit')
                              ->withErrors($validator)
                              ->withInput()
                              ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
              }
      $ambassador->first_name = $request->first_name;
      $ambassador->second_name = $request->second_name;
      $ambassador->email = $request->email;
      $ambassador->phone = $request->phone;
      $ambassador->city = $request->city;
      $ambassador->birth_date = $request->birth_date;
      $save_ambassador=$ambassador->save();
      if($save_ambassador){
        if(agentUser()){
            return redirect('ambassadors')->with('success', 'تم التعديل بنجاح');
        }
        if(ambassadorUser()){
            return redirect('ambassadors/'.$id.'/edit')->with('success', 'تم التعديل بنجاح');
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
      $ambassador=Ambassador::where('id',$id)->select('id','agent_id')->first();
      if(!$ambassador)
      {  return redirect('ambassadors');}
      else
      { $agent_id=$ambassador->agent_id;
        if($agent_id==agentUser()->id){
          $delete_ambassador=DB::table('ambassadors')->where('id', $id)->delete();
          return redirect('ambassadors')->with('success', 'تم الحذف بنجاح');
        }
        else{
          return redirect('ambassadors')->with('master_error', 'غير مسموح بحذف هذا السفير');
        }


        }
    }
}
