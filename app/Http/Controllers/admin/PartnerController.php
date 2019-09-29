<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Ambassador;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Agent;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class PartnerController extends Controller
{

/*================================ start index function=========================*/

    public function index()
    {
        $ambassador_id = request()->get('ambassador_id');

        $agents = DB::table("agents")->pluck("name", "id");
        $partners = Partner::orderBy('id', 'DESC')->get();






        return view('admin.partners.index', compact('agents', 'partners'));
    }
/*================================ end index function=========================*/

/*================================ start getambassadorList function=========================*/

    public function getambassadorList(Request $request)
    {
        $ambassadors = DB::table("ambassadors")
            ->where("agent_id", $request->agent_id)
            ->pluck("first_name", "id");
        return response()->json($ambassadors);
    }
 /*================================ end getambassadorList function=========================*/


/*================================ start searchpartner function=========================*/

    public function searchpartner(Request $request)
    {
        $ambassador_id = request()->get('ambassador');
        $agent_id = request()->get('agent');
        // $partners = Partner::orderBy('id', 'DESC');
        $agents = Agent::pluck("name", "id");
        $search=$request->search;
            $partners = Partner::
                with('ambassador')
                ->with(['ambassador.agent' => function ($query) use ($agent_id) {
                    $query->where('id',$agent_id);
                }]);
                if(!empty($search)){
                    $partners->where('legal_name','like','%'.$search .'%');
                }
                if(!empty($ambassador_id)){
                    $partners->where('ambassador_id',$ambassador_id);
                }


                $partners =  $partners->orderBy('id', 'DESC')->get();







        return view('admin.partners.index',compact('partners', 'agents','ambassadors'));

         }
// /*================================ end searchpartner function=========================*/

/*================================ start create function=========================*/
     public function create()
    {
        $agents = Agent::all();
        $cities = City::where('country_id', 191)->get();

        return view('admin.partners.create', compact('cities', 'ambassador_id','agents'));
    }
/*================================ end create function=========================*/

/*================================ Store store function=========================*/

    public function store(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
            'partner_type' => 'required',
            'legal_name' => ' required |max:255',
            'email' => 'required|email|' . unique_validate('email'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . unique_validate('phone'),
            'city' => 'required|exists:cities,id',
            'map_address' => 'required|max:255',
            'ambassador_id' => 'required',



        ]);
        if ($validator->fails()) {
            return redirect('admin/partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

     

        $partner = new Partner($request->all());

        $partner->password = bcrypt($request->password);
        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/partners';
            Image::make($file->getRealPath())->resize(100, 100)->stream();

            $file->move($destinationPath, $fileName);

            $partner->image = $fileName;

        }
        $ambassador_id = request()->get('ambassador_id');


        $partner->save();
        return redirect()->route('admin.partners.index')->with('message', 'تم التسجيل الشريك بنجاح');
    }
/*================================ end create function=========================*/

/*================================ start show function=========================*/

    // public function show($id)
    // {
    //     $partner = Partner::findOrFail($id);

    //     return response()->json($partner);
    // }

/*================================ end show function=========================*/

/*================================ start edit function=========================*/

    public function edit($id)
    {
        $partner = Partner::find($id);
        $agent_id = $partner->ambassador->agent->id;
        $agents = Agent::all();

        $ambassadors = Ambassador::where('agent_id',$agent_id)->get();

    
        $cities = City::where('country_id', 191)->get(['id', "name"]);
        $isChecked='true';
        return view('admin.partners.edit', compact('partner','agents','ambassadors' ,'agent_id','cities','isChecked'));
    }
/*================================ end edit function=========================*/

/*================================ start update function=========================*/

    public function update(Request $request, $id)
    {
          $checked='';
          $partner = Partner::find($id);
          if(!$partner){
            return redirect('admin/partners')->with('master_error','عفوا لا يوجد شريك لتعديله');
          }
          $validator = Validator::make($request->all(), [
            'partner_type' => 'required',
            'legal_name' => 'required |max:255',
            'email' => 'required|email|' . update_unique_validate('email', $id, 'partners'),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . update_unique_validate('phone', $id, 'partners'),
            'city' => 'required|exists:cities,id',
            'map_address' => 'required|max:255',
            'remember'=>'required',
          ]);
        if ($validator->fails()) {
          $failedRules = $validator->failed();
            return redirect('admin/partners/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        if ($file = $request->hasFile('image')) {
            $old_image=$partner->image;
            $file = $request->file('image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/partners';
            Image::make($file->getRealPath())->resize(100, 100)->stream();
            $file->move($destinationPath, $fileName);
            $partner->image = $fileName;
            if(!empty($old_image)){
              if(file_exists(public_path('images/partners/'.$old_image))){
              unlink(public_path('images/partners/'.$old_image));
             }
            }
        }

        $partner->update($request->all());

        return redirect()->route('admin.partners.edit', $id)->with("message", "تم التعديل بنجاح");

        //$obj->where('name',$name)->update($arr);
    }
/*================================ end update function=========================*/

/*================================ start destroy function=========================*/

    // public function destroy(Request $request)
    // {

    //     $partner = Partner::where('id',$auth_user)->select('id','ambassador_id')->first();

    //   if(!$partner)
    //   {
    //     return redirect()->route('partners.index')->with("master_error", "غير مسموح لك بحذف هذا الشريك");
    // }else{

    //     $ambassador_id= $auth_user;//$partner->ambassador_id;

    //       $delete_partner=DB::table('partners')->where('id', $auth_user)->delete();
    //       return redirect('partners')->with('message', 'تم الحذف بنجاح');

    // }
    // }
    /*================================ end destroy function=========================*/

}
