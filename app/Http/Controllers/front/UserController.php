<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB;

class UserController extends Controller
{
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $data)
    {
        $validator = Validator::make($request->all(), [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
        if ($validator->fails()) {
            return redirect('users/create')
                ->withErrors($validator)
                ->withInput()
                ->with('master_error', 'يجب إصلاح الأخطاء التى تظهر في الاسفل');
        }
        $user = new User($request->all());
        $user->save();

        return redirect()->route('/');

    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
