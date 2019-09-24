<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Embassador;
use App\Http\Controllers\Controller;
use App\Partner;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class PartnerController extends Controller
{

/*================================ start index function=========================*/

    public function index()
    {
        $agents = DB::table("agents")->pluck("name", "id");
        $partners = Partner::orderBy('id', 'DESC')->get();
        foreach($partners as $partner){
            $partner->agent;
            $partner->created_at;
            $agents = $partner->post_os;
            $embassadors = $partner->embassadors;
            $agents = $partner->agents;

            foreach($embassadors as $embassador){
                $embassador = Embassador::where('id', $embassador->embassador_id)->first();
                $embassador['first_name'] = $embassador['first_name'];
            }

            foreach($agents as $agent){
                $agent = Agent::where('id', $agent->agent_id)->first();
                $agent['name'] = $agent['name'];
            }

         
        }

        



        

        return view('admin.partners.index', compact('agents', 'partners'));
    }
/*================================ end index function=========================*/

/*================================ start getembassadorList function=========================*/

    public function getembassadorList(Request $request)
    {
        $embassadors = DB::table("embassadors")
            ->where("agent_id", $request->agent_id)
            ->pluck("first_name", "id");
        return response()->json($embassadors);
    }
/*================================ end getembassadorList function=========================*/

/*================================ start getpartnerList function=========================*/

    public function getpartnerList(Request $request)
    {
        $partners = DB::table("partners")
            ->where("embassador_id", $request->embassador_id)
            ->pluck("legel_name", "id");

        return response()->json($partners);
    }
/*================================ end getpartnerList function=========================*/

/*================================ start searchpartner function=========================*/

    public function searchpartner(Request $request)
    {
        $partners = Partner::orderBy('id', 'DESC');
        $agents = DB::table("agents")->pluck("name", "id");

        if (request()->has('search') && request()->get('search') != '') {
            $partners->where('legal_name', 'like', '%' . request()->get('search') . '%');
        }
        $partners = $partners->get();
        return view('admin.partners.index', compact('partners', 'agents'));

    }
/*================================ end searchpartner function=========================*/

/*================================ start create function=========================*/
    public function create()
    {
        $embassadors = Embassador::all();

        $cities = City::where('country_id', 191)->get();

        return view('admin.partners.create', compact('cities', 'embassadors'));
    }

    public function store(Request $request)
    {
        // first tab
        $validator = Validator::make($request->all(), [
            // 'embassador_id' => 'required|unique:partners,embassador_id|max:255',
            'partner_type' => 'required',
            'legal_name' => ' required |max:255',
            'email' => 'required|email|' . unique_validate('email'),

            'password' => 'min:8|required_with:confirm_password|same:confirm_password',

        ]);
        if ($validator->fails()) {
            session()->flash('activeTab', '');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        // second tab
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            session()->flash('activeTab', 'tab2');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        // third tab
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . unique_validate('phone'),
            'city' => 'required|exists:cities,id',
        ]);

        if ($validator->fails()) {
            session()->flash('activeTab', 'tab3');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        $validator = Validator::make($request->all(), [
            'map_address' => 'required|max:255',

        ]);

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

        $partner->save();

        return redirect()->route('admin.partners.create')->with('message', 'تم التسجيل الشريك بنجاح');
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

        $cities = City::where('country_id', 191)->get(['id', "name"]);

        return view('admin.partners.create', compact('partner', 'cities'));

    }
/*================================ end edit function=========================*/

/*================================ start update function=========================*/

    public function update(Request $request, $id)
    {
        // first tab
        $validator = Validator::make($request->all(), [
            'partner_type' => 'required',
            'legal_name' => ' required |max:255',
            'email' => 'required|email|' . update_unique_validate('email', $id, 'partners'),

        ]);
        if ($validator->fails()) {
            session()->flash('activeTab', '');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        // second tab
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            session()->flash('activeTab', 'tab2');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        // third tab
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|' . update_unique_validate('phone', $id, 'partners'),
            'city' => 'required|exists:cities,id',
        ]);

        if ($validator->fails()) {
            session()->flash('activeTab', 'tab3');
            return redirect('partners/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }

        $validator = Validator::make($request->all(), [
            'map_address' => 'required|max:255',

        ]);

        $partner = Partner::find($id);

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/partners';
            Image::make($file->getRealPath())->resize(100, 100)->stream();

            $file->move($destinationPath, $fileName);

            $partner->image = $fileName;

        }

        $partner->update($request->all());

        return redirect()->route('admin.partners.edit', $id)->with("message", "تم التعديل بنجاح");

        //$obj->where('name',$name)->update($arr);
    }
/*================================ end update function=========================*/

/*================================ start destroy function=========================*/

    // public function destroy(Request $request)
    // {

    //     $partner = Partner::where('id',$auth_user)->select('id','embassador_id')->first();

    //   if(!$partner)
    //   {
    //     return redirect()->route('partners.index')->with("master_error", "غير مسموح لك بحذف هذا الشريك");
    // }else{

    //     $embassador_id= $auth_user;//$partner->embassador_id;

    //       $delete_partner=DB::table('partners')->where('id', $auth_user)->delete();
    //       return redirect('partners')->with('message', 'تم الحذف بنجاح');

    // }
    // }
    /*================================ end destroy function=========================*/

}
