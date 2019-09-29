<?php

namespace App\Http\Controllers\front;

use App\City;
use App\Http\Controllers\Controller;
use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

use App\Services\VerifyUserService;

class PartnerController extends Controller
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
      $search_type=$request->search_type;
      $cities = City::where('country_id', 191)->get();
      $types=partnersTypesArray();

      $partners = Partner::with('citydata')->where('ambassador_id', ambassadorUser()->id)
                            ->where(function ($q1) use ($searchByName) {
                                  $q1->where('legal_name','like',"%".$searchByName."%");})
                            ->where(function ($q2) use ($searchByEmail) {
                                  $q2->where('email','like',"%".$searchByEmail."%");});
        if(isset($search_type)){
          $partners->where(function ($q3) use ($search_type) {
                   $q3->where('partner_type',$search_type);});
        }
        if(isset($searchByCity)){
          $partners->with(['citydata' => function ($query) use ($searchByCity){
                     $query->select('id', 'name')->where('id',$searchByCity);}]);
        }
          $partners =  $partners ->latest()->orderBy('id')->paginate(10);

        return view('front.partners.index', compact('partners'))
            ->with('searchByName', $searchByName)
            ->with('searchByEmail', $searchByEmail)
            ->with('searchByCity', $searchByCity)
            ->with('search_type', $search_type)
            ->with('types', $types)
            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::where('country_id', 191)->get();
        return view('front.partners.create', compact('cities'));
    }

    public function store(Request $request)
    {
        // first tab
        $validator = Validator::make($request->all(), [
            // 'ambassador_id' => 'required|unique:partners,ambassador_id|max:255',
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        $partner->ambassador_id = ambassadorUser()->id;
        $partner->save();


        VerifyUserService::verify($partner);

        return redirect()->route('partners.index')->with('message', 'تم التسجيل الشريك بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types=partnersTypesArray();
        $partner = Partner::with('citydata')->
        findOrFail($id);
        if (!$partner) {
            return redirect('/');
        }
        if ($partner->ambassador_id != ambassadorUser()->id) {
            return ' غير مسموح لك بعرض هذا الشريك ';
        }
        return response()->json(['partner'=>$partner,'types'=>$types]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        if (!$partner) return redirect('/');

        if(ambassadorUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(ambassadorUser()->id != $partner->ambassador_id) return redirect('/');
        }

        if(partnerUser() && partnerUser()->id != $partner->id) return redirect('/');


        $cities = City::where('country_id', 191)->get(['id', "name"]);

        return view('front.partners.create', compact('partner', 'cities'));

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
        $partner = Partner::find($id);
        if (!$partner) return redirect('/');

        if(ambassadorUser()){
            if(!isEmailVerified()) return redirect('email-not-verified');
            if(ambassadorUser()->id != $partner->ambassador_id) return redirect('/');
        }

        if(partnerUser() && partnerUser()->id != $partner->id) return redirect('/');


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



         $current_email = $partner->email;
        // $partner = new Partner($request->all());

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
        if (ambassadorUser()) {

            if($current_email != $partner->email){
                VerifyUserService::verify($partner);
            }

            return redirect()->route('partners.index')->with("message", "تم التعديل بنجاح");
        }elseif(partnerUser()){
            return redirect()->route('partners.edit',$id)->with("message", "تم التعديل بنجاح");

        }


        //$obj->where('name',$name)->update($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
