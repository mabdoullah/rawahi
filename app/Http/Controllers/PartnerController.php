<?php

namespace App\Http\Controllers;

use App\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $partnar = Partner::all();
        // return view('Partner')->with("partners",$partnar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partnersTypesArray= partnersTypesArray();
        return view('partners.registration-form',compact('partnersTypesArray'));
    }

    public function store(Request $request)
    {
            // first tab
            $validator = Validator::make($request->all(), [
                'embassador_id' => 'required|unique:partners,embassador_id|max:255',
                'services' => 'required',
                'legal_name' => ' required |max:255',
                'email' => 'required|email|unique:partners,email',
                'subscription_type' => 'required',

            ]);
            if ($validator->fails()) {
                session()->flash('activeTab','');
                return redirect('partner/create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('master_error', 'please fix error in below!');
            }


            // second tab
            $validator = Validator::make($request->all(), [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validator->fails()) {
                session()->flash('activeTab','tab2');
                return redirect('partner/create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('master_error', 'please fix error in below!');
            }

            // third tab
            $validator = Validator::make($request->all(), [
                'phone' => 'required|numeric|min:11|unique:partners,phone',

            ]);

            if ($validator->fails()) {
                session()->flash('activeTab','tab3');
                return redirect('partner/create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('master_error', 'please fix error in below!');
            }

            


        $partner = new Partner($request->all());
        $partner->image = '/public/images/' . $request->image;

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = rand() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/images/';
            $file->move($destinationPath, $fileName);
            $partner->image = $fileName;
        }

        $partner->save();

        return redirect()->route('partner.create')->with('success', 'registeration successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $partner = Partner::findOrFail($id);
        // return view('show')->with("partner",$partnar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $partner = Partner::findOrFail($id);
        // return view('edit')->with("partner",$partner);
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
        // $partner = Partner::find($id)->update($request->all());
        // return redirect()->route('partner.show', $id)->with("message", "Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $partner = Partner::findOrFail($id);
        // $partner->delete();
        // return redirect()->route('partner.index')->with("message", "Delete Success");
    }
}
