<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Partner;
use App\City;
use Image;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners =Partner::where('embassador_id',embassadorUser()->id)->latest()->orderBy('id')->paginate(10);
        return view('front.partners.index',['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partnersTypesArray= partnersTypesArray();
        $cities =City::where('country_id',191)->get();

        return view('front.partners.create',compact('partnersTypesArray' ,'cities'));
    }

    public function store(Request $request)
    {
            // first tab
            $validator = Validator::make($request->all(), [
                // 'embassador_id' => 'required|unique:partners,embassador_id|max:255',
                'partner_type' => 'required',
                'legal_name' => ' required |max:255',
                'email' => 'required|email|'.unique_validate('email'),

                
                'password' =>'min:8|required_with:confirm_password|same:confirm_password',



            ]);
            if ($validator->fails()) {
                session()->flash('activeTab','');
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
                session()->flash('activeTab','tab2');
                return redirect('partners/create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
            }

            // third tab
            $validator = Validator::make($request->all(), [
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|'.unique_validate('phone'),
                'city' => 'required|exists:cities,id',
            ]);

            if ($validator->fails()) {
                session()->flash('activeTab','tab3');
                return redirect('partners/create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
            }


            $validator = Validator::make($request->all(), [
                'map_address' => 'required|max:255',


            ]);

        $partner = new Partner($request->all());
        $partner->image = '/public/images/' . $request->image;
        $partner->password=bcrypt($request->password);
        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/partners';
            Image::make($file->getRealPath())->resize(100, 100)->stream();

            $file->move($destinationPath, $fileName);

            $partner->image = $fileName;


        }
        // $partnar->embassador_id=1; //stistic embassador_id will change
        $partner->save();

        return redirect()->route('partners.index')->with('success', 'تم التسجيل بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        if(!$partner){
            return redirect('/');
        }
       if($partnar->embassador_id != embassadorUser()->id){
            return ' غير مسموح لك بعرض هذا الشريك ';
        }
        return response()->json($partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $partnersTypesArray= partnersTypesArray();
        $cities =City::where('country_id',191)->get(['id',"name"]);

        $partner = Partner::find($id);


        if(!$partner){
            return redirect('/');
        }
        if($partnar->embassador_id != embassadorUser()->id){
            return ' غير مسموح لك بتعديل هذا الشريك ';
        }

        return view('front.partners.create',compact('partner','partnersTypesArray','cities'));




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

        $partner = Partner::find($id)->update($request->all());
        if(!$partner){
            return redirect('/');
        }
       if($partnar->embassador_id != embassadorUser()->id){
            return ' غير مسموح لك بتعديل هذا الشريك ';
        }
        return redirect()->route('partners.index')->with("message", "Updated Success");

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




    //     $partner = Partner::where('id',$auth_user)->select('id','embassador_id')->first();

    //   if(!$partner)
    //   {
    //     return redirect()->route('partners.index')->with("master_error", "غير مسموح لك بحذف هذا الشريك");
    // }else{

    //     $embassador_id= $auth_user;//$partner->embassador_id;




    //       $delete_partner=DB::table('partners')->where('id', $auth_user)->delete();
    //       return redirect('partners')->with('success', 'تم الحذف بنجاح');





    // }
    // }
}
