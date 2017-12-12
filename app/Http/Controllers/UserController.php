<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

use Hash;

use Validator;

class UserController extends Controller
{    //
    public function index(){
    	$User = User::first();
    	return view('index', compact('User'));
    }

   

    public function services(){
    	return view('services');
    }

    public function gallery(){
    	return view('gallery');
    }

    public function mail(){
    	return view('mail');
    }

    public function signup(Request $request){
    

        //validate

        $validator = Validator::make($request->all(),[

            'name' => 'required',

            'email' => 'required|unique:users,email',

            'password' => 'required|confirmed'
        ]);


        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->with('mess','register');
        }



    	$user = User::create([
    		'name' => request ('name'),
    		'email' => request ('email'),

    		'password' => bcrypt(request ("password")),

    		'role' => '3'

    		]);
        //sign in

        auth()->login($user);


    	return redirect("/customer");
    }

    public function logout(){

        auth()->logout();
        return redirect('/');
    }

    public function signin(){

        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];
        
        if (auth()->attempt($credentials)){
            $role = User::where('email',request('email'))->first()->role;
            if ($role ==1){
                return redirect('panel');
            }
            else if ($role==2){
                return redirect('driver');
            }
            else {
                return redirect('customer');
            }
        }   
        
        return redirect('/')->with('mess','login')->withErrors([
                    'message' => 'Xin vui lòng kiểm tra lại thông tin'
                ]);
        

    }

    

}

